@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Transaction Report</h1>
        <div class="card">
            <div class="card-header">
                Total Amount of All Transactions
            </div>
            <div class="card-body">
                <h2>${{ number_format($totalAmount, 2) }}</h2>
                <a href="{{ route('transactions.index') }}" class="btn btn-primary">Back to Transactions</a>
            </div>
        </div>
    </div>
@endsection
