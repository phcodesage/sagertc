@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <a href="{{ route('purchases.create') }}" class="btn btn-primary">Add Purchase</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->item_name }}</td>
                    <td>{{ $purchase->amount }}</td>
                    <td>{{ $purchase->status }}</td>
                    <td>
                        <a href="{{ route('purchases.edit', $purchase) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('purchases.destroy', $purchase) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 