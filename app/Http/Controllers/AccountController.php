<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        $accounts = Account::search($request->search)->get();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'customer_name' => 'required|string',
            'initial_balance' => 'required|numeric|min:0'
        ]);

        Account::create([
            'customer_name' => $req->customer_name,
            'balance'       => $req->initial_balance,
        ]);

        return redirect()->route('accounts.index');
    }

    public function show(Request $request, Account $account)
    {
        $transactions = $account
            ->transactions()
            ->dateBetween($request->start, $request->end)
            ->get();

        return view('accounts.show', compact('account', 'transactions'));
    }

    public function transaction(Request $req, Account $account)
    {
        $req->validate([
            'type'   => 'required|in:deposit,withdrawal',
            'amount' => 'required|numeric|min:0.01'
        ]);

        $amount = $req->amount;
        if ($req->type === 'withdrawal' && $amount > $account->balance) {
            return back()->withErrors('Fondos insuficientes.');
        }

        // registra transacción
        $account->transactions()->create([
            'type'   => $req->type,
            'amount' => $amount,
        ]);

        // actualiza saldo
        $newBalance = $req->type === 'deposit' 
                      ? $account->balance + $amount 
                      : $account->balance - $amount;

        $account->update(['balance' => $newBalance]);

        return redirect()->route('accounts.show', $account);
    }
}
