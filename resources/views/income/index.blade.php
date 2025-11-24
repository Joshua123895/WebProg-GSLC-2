@extends('layout')
@section('title', 'Income')
@section('content')
<h3>Income List</h3>

<a href="{{ route('income.create') }}" class="btn btn-success mb-3">Add Income</a>

<table class="table table-bordered">
    <tr>
        <th>Amount</th>
        <th>Source</th>
        <th>Description</th>
        <th>Date</th>
        <th>Receipt</th>
        <th>Action</th>
    </tr>

    @foreach($incomes as $inc)
    <tr>
        <td>{{ $inc->amount }}</td>
        <td>{{ $inc->source }}</td>
        <td>{{ $inc->desc }}</td>
        <td>{{ $inc->date }}</td>
        <td>
            @if($inc->receipt_file)
                <a href="{{ asset('storage/' . $inc->receipt_file) }}" target="_blank">View</a>
            @endif
        </td>
        <td>
            <a href="{{ route('income.edit', $inc->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('income.destroy', $inc->id) }}"
                  method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
