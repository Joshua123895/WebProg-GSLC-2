@extends('layout')
@section('title', 'Income (create)')
@section('content')
<h3>Add Income</h3>

<form method="POST" action="{{ route('income.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Amount</label>
        <input type="number" step="0.01" name="amount" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Source</label>
        <select name="source" class="form-select" required>
            @foreach(App\Models\Income::SOURCE as $s)
                <option value="{{ $s }}">{{ $s }}</option>
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

    <button class="btn btn-success">Save</button>
</form>
@endsection
