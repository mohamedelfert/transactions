@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transaction Details</h1>
        <div class="card">
            <div class="card-header">
                Transaction ID: {{ $transaction->id }}
            </div>
            <div class="card-body">
                <p><strong>Date:</strong> {{ $transaction->date }}</p>
                <p><strong>Amount:</strong> {{ $transaction->amount }}</p>
                <p><strong>Receiver:</strong> {{ $transaction->receiver }}</p>
                <p><strong>Notes:</strong> {{ $transaction->notes }}</p>
                <a href="{{ route('transactions.index') }}" class="btn btn-primary">Back to Transactions</a>
            </div>
        </div>
    </div>
@endsection
