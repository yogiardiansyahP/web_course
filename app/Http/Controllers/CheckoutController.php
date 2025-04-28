<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function getSnapToken(Request $request)
    {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = filter_var(env('MIDTRANS_IS_PRODUCTION', false), FILTER_VALIDATE_BOOLEAN);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    
        $hargaAwal = 2500000;
        $hargaDiskon = $hargaAwal;
    
        if ($request->voucher === 'CODEINCOURSEIDNBGR') {
            $hargaDiskon = 395000;
        }
    
        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . uniqid(),
                'gross_amount' => $hargaDiskon,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
        ];
    
        try {
            $token = Snap::getSnapToken($params);
            return response()->json(['token' => $token, 'hargaDiskon' => $hargaDiskon, 'hargaAwal' => $hargaAwal]);
        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage());
            return response()->json(['error' => 'Gagal mendapatkan token'], 500);
        }
    }    
}
