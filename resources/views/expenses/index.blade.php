@extends('layout')
@section('title', 'Expenses')
@section('content')
<h3>Expense List</h3>

<a href="{{ route('expenses.create') }}" class="btn btn-danger mb-3">Add Expense</a>

<table class="table table-bordered">
    <tr>
        <th>Amount</th>
        <th>Category</th>
        <th>Description</th>
        <th>Date</th>
        <th>Receipt</th>
        <th>Action</th>
    </tr>

    @foreach($expenses as $exp)
    <tr>
        <td>{{ $exp->amount }}</td>
        <td>{{ $exp->category }}</td>
        <td>{{ $exp->desc }}</td>
        <td>{{ $exp->date }}</td>
        <td>
            @if($exp->receipt_file)
                <a href="/storage/{{ $exp->receipt_file }}" target="_blank">View</a>
            @endif
        </td>
        <td>
            <a href="{{ route('expenses.edit', $exp->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('expenses.destroy', $exp->id) }}"
                  method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
