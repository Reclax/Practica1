<?php

namespace App\Http\Controllers;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::dateBetween($request->start, $request->end)
            ->with('account')
            ->get();

        return view('transactions.index', compact('transactions'));
    }
}
