<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Transaction as MidtransTransaction;
use App\Models\Transaction;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $limit = $request->input('limit', 4);
        $search = $request->input('search');
    
        $transactions = Transaction::with('course')
            ->where('user_id', $userId)
            ->when($search, function ($query, $search) {
                $query->whereHas('course', function ($q) use ($search) {
                    $q->where('title', 'like', '%' . $search . '%');
                });
            })
            ->paginate($limit);
    
        return view('transaksi', compact('transactions'));
    }    

    public function show($id)
    {
        $transaction = Transaction::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('course')
            ->firstOrFail();

        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        try {
            $status = json_decode(json_encode(
                MidtransTransaction::status($transaction->order_id)
            ));

            $transaction->status = match ($status->transaction_status ?? '') {
                'capture', 'settlement' => 'completed',
                'pending' => 'pending',
                'deny', 'cancel', 'expire', 'failure' => 'failed',
                default => 'unknown',
            };

            $transaction->payment_status = $status->transaction_status ?? 'unknown';
            $transaction->save();
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
        }

        return view('transaksi.show', compact('transaction'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        $transaction = new Transaction();
        $transaction->user_id = Auth::id();
        $transaction->course_id = $request->course_id;
        $transaction->amount = $request->amount;
        $transaction->payment_method = $request->payment_method;
        $transaction->status = 'pending';
        $transaction->order_id = 'ORDER-' . uniqid();
        $transaction->save();

        return response()->json([
            'message' => 'Transaction created successfully',
            'transaction' => $transaction,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|string|in:pending,completed,failed',
        ]);

        $transaction->status = $request->status;
        $transaction->save();

        return response()->json([
            'message' => 'Transaction updated successfully',
            'transaction' => $transaction,
        ]);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response()->json([
            'message' => 'Transaction deleted successfully',
        ]);
    }

    public function apiIndex(Request $request)
    {
        $userId = $request->user()->id;
        $transactions = Transaction::where('user_id', $userId)->with('course')->get();

        return response()->json([
            'success' => true,
            'data' => $transactions->map(function ($t) {
                return [
                    'order_id' => $t->order_id,
                    'status' => $t->status,
                    'course_name' => $t->course->title ?? null,
                    'amount' => $t->amount,
                ];
            }),
        ]);
    }
}
