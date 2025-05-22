<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;

Route::get('/', [AccountController::class, 'index'])->name('accounts.index');
Route::get('accounts/create', [AccountController::class, 'create'])->name('accounts.create');
Route::post('accounts', [AccountController::class, 'store'])->name('accounts.store');
Route::get('accounts/{account}', [AccountController::class, 'show'])->name('accounts.show');
Route::post('accounts/{account}/transaction', [AccountController::class, 'transaction'])
     ->name('accounts.transaction');

Route::get('transactions', [TransactionController::class, 'index'])
     ->name('transactions.index');