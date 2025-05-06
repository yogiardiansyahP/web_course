<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $transactions = Transaction::where('user_id', $userId)->get();
        return view('transaksi', compact('transactions'));
    }
    
    public function show($id)
    {
        $userId = Auth::id();
        $transaction = Transaction::with('course')->where('user_id', $userId)->findOrFail($id);
        return view('transaksi.detail', compact('transaction'));
    }      
}
