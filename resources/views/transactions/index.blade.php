@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Transactions</h1>
            <div>
                <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add Transaction</a>
                <a href="{{ route('transactions.report') }}" class="btn btn-secondary">Generate Report</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Transactions (Page {{ $transactions->currentPage() }} of {{ $transactions->lastPage() }})
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Amount</th>
                            <th>Receiver</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>${{ number_format($transaction->amount, 2) }}</td>
                                <td>{{ $transaction->receiver }}</td>
                                <td>{{ $transaction->date->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('transactions.show', $transaction->id) }}"
                                        class="btn btn-info">View</a>
                                    <a href="{{ route('transactions.edit', $transaction->id) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total Amount:</strong></td>
                            <td>${{ number_format($totalAmount, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>
                {{ $transactions->links() }} <!-- Pagination links -->
            </div>
        </div>
    </div>
@endsection
