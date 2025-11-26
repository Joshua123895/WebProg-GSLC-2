@extends('layout')
@section('title', __('messages.income'))
@section('content')

<h3>{{ __('messages.add_income') }}</h3>

<form method="POST" action="{{ route('income.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>{{ __('messages.amount') }}</label>
        <input type="number" min="0" step="0.01" name="amount" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.source') }}</label>
        <select name="source" class="form-select" required>
            @foreach(App\Models\Income::SOURCE as $s)
                <option value="{{ $s }}">{{ $s }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.description') }}</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.date') }}</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.receipt_optional') }}</label>
        <input type="file" name="receipt_file" class="form-control">
    </div>

    <button class="btn btn-success">{{ __('messages.save') }}</button>
</form>

@endsection
