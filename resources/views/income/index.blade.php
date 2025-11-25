@extends('layout')
@section('title', __('messages.income'))
@section('content')

<h3>{{ __('messages.income_list') }}</h3>
<div class="ms-auto d-flex align-items-center justify-content-between gap-3">
    <a href="{{ route('income.create') }}" class="btn btn-primary mb-3">
        {{ __('messages.add_income') }}
    </a>
    <a href="/dashboard" class="btn btn-secondary mb-3">
        <i class="fas fa-sign-out-alt me-1"></i>{{ __('messages.back') }}
    </a>
</div>

<table class="table table-bordered">
    <tr>
        <th>{{ __('messages.amount') }}</th>
        <th>{{ __('messages.source') }}</th>
        <th>{{ __('messages.description') }}</th>
        <th>{{ __('messages.date') }}</th>
        <th>{{ __('messages.receipt') }}</th>
        <th>{{ __('messages.action') }}</th>
    </tr>

    @foreach($incomes as $inc)
    <tr>
        <td>{{ $inc->amount }}</td>
        <td>{{ $inc->source }}</td>
        <td>{{ $inc->desc }}</td>
        <td>{{ $inc->date }}</td>
        <td>
            @if($inc->receipt_file)
                <a href="{{ asset('storage/' . $inc->receipt_file) }}" target="_blank">
                    {{ __('messages.view') }}
                </a>
            @endif
        </td>
        <td>
            <a href="{{ route('income.edit', $inc->id) }}" class="btn btn-warning btn-sm">
                {{ __('messages.edit') }}
            </a>

            <form action="{{ route('income.destroy', $inc->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    {{ __('messages.delete') }}
                </button>
            </form>
        </td>
    </tr>
    @endforeach

</table>
@endsection
