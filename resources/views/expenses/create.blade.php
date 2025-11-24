@extends('layout')
@section('title', 'Expenses (create)')
@section('content')
<h3>Add Expense</h3>

<form method="POST" action="{{ route('expenses.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Amount</label>
        <input type="number" step="0.01" name="amount" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category" class="form-select" required>
            @foreach(App\Models\Expense::CATEGORY as $c)
                <option value="{{ $c }}">{{ $c }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="desc" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Receipt (optional)</label>
        <input type="file" name="receipt_file" class="form-control">
    </div>

    <button class="btn btn-danger">Save</button>
</form>
@endsection
