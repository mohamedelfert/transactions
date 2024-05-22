<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{    
    public function index()
    {
        $transactions = Transaction::paginate(10);
        $totalAmount = Transaction::sum('amount');
        return view('transactions.index', compact('transactions','totalAmount'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'receiver' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        Transaction::create($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'receiver' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $transaction->update($request->all());

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }

    public function report()
    {
        dd('Report method called');
        $totalAmount = Transaction::sum('amount');
        return view('transactions.report', compact('totalAmount'));
    }
}
