<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Course;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function checkoutPage($courseId)
    {
        $course = Course::findOrFail($courseId);
        return view('checkout', compact('course'));
    }

    public function getSnapToken(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if (!$request->has('hargaAwal') || !is_numeric($request->hargaAwal)) {
            return response()->json(['error' => 'Invalid hargaAwal'], 422);
        }

        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $hargaAwal = $request->hargaAwal;
        $hargaDiskon = $hargaAwal;

        if ($request->voucher === 'CODEINCOURSEIDNBGR') {
            $hargaDiskon = 395000;
        }

        $orderId = 'ORDER-' . uniqid();
        $courseName = $request->course_name;
        $userEmail = Auth::user()->email;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $hargaDiskon,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => $userEmail,
            ],
            'custom_expiry' => [
                'start_time' => now()->toDateTimeString(),
                'unit' => 'minute',
                'duration' => 60
            ],
            'payment_amounts' => [
                [
                    'amount' => $hargaDiskon,
                    'currency' => 'IDR',
                ]
            ]
        ];

        try {
            $token = Snap::getSnapToken($params);

            return response()->json([
                'token' => $token,
                'order_id' => $orderId,
                'hargaDiskon' => $hargaDiskon,
                'hargaAwal' => $hargaAwal,
                'status' => 'waiting_payment',
                'payment_method' => null,
                'payment_status' => null,
                'course_name' => $courseName,
                'user_email' => $userEmail,
            ]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mendapatkan token'], 500);
        }
    }

    public function saveTransaction(Request $request)
    {
        $transaction = new Transaction();
        $transaction->order_id = $request->order_id;
        $transaction->user_id = $request->user_id;
        $transaction->harga_awal = $request->hargaAwal;
        $transaction->harga_diskon = $request->hargaDiskon;
        $transaction->voucher = $request->voucher;
        $transaction->course_name = $request->course_name;
        $transaction->status = $request->status;
        $transaction->save();

        return response()->json(['message' => 'Transaction saved successfully.']);
    }

    public function midtransCallback(Request $request)
    {
        $payload = $request->getContent();
        $signatureKey = $request->header('x-signature-key');
        $serverKey = env('MIDTRANS_SERVER_KEY');

        $json = json_decode($payload, true);
        $expectedSignature = hash('sha512', $json['order_id'].$json['status_code'].$json['gross_amount'].$serverKey);

        if ($signatureKey !== $expectedSignature) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $transaction = Transaction::where('order_id', $json['order_id'])->first();

        if ($transaction) {
            $transaction->status = match ($json['transaction_status']) {
                'capture', 'settlement' => 'completed',
                'pending' => 'pending',
                'deny', 'cancel', 'expire', 'failure' => 'failed',
                default => 'unknown',
            };

            $transaction->payment_method = $json['payment_type'] ?? null;
            $transaction->payment_status = $json['transaction_status'] ?? null;

            if (!$transaction->course_name) {
                $course = Course::where('id', $json['course_id'])->first();
                $transaction->course_name = $course ? $course->name : 'Unknown Course';
            }

            $transaction->save();
        }

        return response()->json(['message' => 'Notification received'], 200);
    }

    public function showTransactions()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return response()->json(['transactions' => $transactions]);
    }

    public function handlePaymentCallback(Request $request)
    {
        $transactionId = $request->input('transaction_id');
        $status = $request->input('status');

        $transaction = Transaction::where('order_id', $transactionId)->first();

        if ($transaction) {
            $transaction->status = match ($status) {
                'capture', 'settlement' => 'completed',
                'pending' => 'pending',
                'deny', 'cancel', 'expire', 'failure' => 'failed',
                default => 'unknown',
            };

            $transaction->payment_status = $status;
            $transaction->save();
        }

        return response()->json(['message' => 'Payment status updated successfully']);
    }
}
