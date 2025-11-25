@extends('layout')
@section('title', __('messages.expenses'))
@section('content')
<h3>{{__('messages.expenses_list')}}</h3>

<form method="POST" action="{{ route('expenses.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>{{ __('messages.amount') }}</label>
        <input type="number" step="0.01" name="amount" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.category') }}</label>
        <select name="category" class="form-select" required>
            @foreach(App\Models\Expense::CATEGORY as $c)
                <option value="{{ $c }}">{{ $c }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.description') }}</label>
        <textarea name="desc" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.date') }}</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.receipt_optional') }}</label>
        <input type="file" name="receipt_file" class="form-control">
    </div>

    <button class="btn btn-danger">{{ __('messages.save') }}</button>
</form>
@endsection
