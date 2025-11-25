@extends('layout')
@section('title', __('messages.income'))
@section('content')

<h3>{{ __('messages.edit_income') }}</h3>

<form method="POST" action="{{ route('income.update', $income->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>{{ __('messages.amount') }}</label>
        <input type="number" step="0.01" name="amount" value="{{ $income->amount }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.source') }}</label>
        <select name="source" class="form-select" required>
            @foreach(App\Models\Income::SOURCE as $s)
                <option value="{{ $s }}" @selected($income->source == $s)>{{ $s }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.description') }}</label>
        <textarea name="desc" class="form-control">{{ $income->desc }}</textarea>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.date') }}</label>
        <input type="date" name="date" value="{{ $income->date }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>{{ __('messages.receipt_optional') }}</label>
        <input type="file" name="receipt_file" class="form-control">

        @if($income->receipt_file)
            <small>
                <a href="/storage/{{ $income->receipt_file }}" target="_blank">
                    {{ __('messages.view_current_receipt') }}
                </a>
            </small>
        @endif
    </div>

    <button class="btn btn-primary">{{ __('messages.update') }}</button>
</form>

@endsection
