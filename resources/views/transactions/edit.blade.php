@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Transaction</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ $transaction->date }}"
                    required>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount"
                    value="{{ $transaction->amount }}" required>
            </div>
            <div class="form-group">
                <label for="receiver">Receiver</label>
                <input type="text" class="form-control" id="receiver" name="receiver"
                    value="{{ $transaction->receiver }}" required>
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea class="form-control" id="notes" name="notes">{{ $transaction->notes }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Transaction</button>
        </form>
    </div>
@endsection
