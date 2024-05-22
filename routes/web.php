<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::resource('transactions', TransactionController::class);
Route::get('transactions/report', [TransactionController::class, 'report'])->name('transactions.report');