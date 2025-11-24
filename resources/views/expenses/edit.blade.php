@extends('layout')
@section('title', 'Expenses (edit)')
@section('content')
<h3>Edit Expense</h3>

<form method="POST" action="{{ route('expenses.update', $expense->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Amount</label>
        <input type="number" step="0.01" name="amount" value="{{ $expense->amount }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category" class="form-select" required>
            @foreach(App\Models\Expense::CATEGORY as $c)
                <option value="{{ $c }}" @selected($expense->category == $c)>{{ $c }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="desc" class="form-control">{{ $expense->desc }}</textarea>
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" value="{{ $expense->date }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Receipt</label>
        <input type="file" name="receipt_file" class="form-control">
        @if($expense->receipt_file)
        <small><a href="/storage/{{ $expense->receipt_file }}" target="_blank">View current receipt</a></small>
        @endif
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
