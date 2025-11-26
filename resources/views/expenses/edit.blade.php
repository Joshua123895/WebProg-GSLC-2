@extends('layout')
@section('title', __('messages.expenses'))
@section('content')
<h3>{{__('messages.edit_expenses')}}</h3>

<form method="POST" action="{{ route('expenses.update', $expense->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>{{ __('messages.amount') }}</label>
        <input type="number" min="0" step="0.01" name="amount" value="{{ $expense->amount }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.category') }}</label>
        <select name="category" class="form-select" required>
            @foreach(App\Models\Expense::CATEGORY as $c)
                <option value="{{ $c }}" @selected($expense->category == $c)>{{ $c }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.description') }}</label>
        <textarea name="description" class="form-control">{{ $expense->desc }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.date') }}</label>
        <input type="date" name="date" value="{{ $expense->date }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.receipt_optional') }}</label>
        <input type="file" name="receipt_file" class="form-control">
        @if($expense->receipt_file)
        <small><a href="/storage/{{ $expense->receipt_file }}" target="_blank">{{ __('messages.view_current_receipt') }}</a></small>
        @endif
    </div>

    <button class="btn btn-primary">{{ __('messages.update') }}</button>
</form>
@endsection
