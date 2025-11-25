@extends('layout')
@section('title', __('messages.expenses'))
@section('content')

<h3>{{ __('messages.income_list') }}</h3>

<div class="ms-auto d-flex align-items-center justify-content-between gap-3">
    <a href="{{ route('expenses.create') }}" class="btn btn-primary mb-3">
        {{ __('messages.add_expenses') }}
    </a>
    <a href="/dashboard" class="btn btn-secondary mb-3">
        <i class="fas fa-sign-out-alt me-1"></i>{{ __('messages.back') }}
    </a>
</div>

<table class="table table-bordered">
    <tr>
        <th>{{ __('messages.amount') }}</th>
        <th>{{ __('messages.category') }}</th>
        <th>{{ __('messages.description') }}</th>
        <th>{{ __('messages.date') }}</th>
        <th>{{ __('messages.receipt') }}</th>
        <th>{{ __('messages.action') }}</th>
    </tr>

    @foreach($expenses as $exp)
    <tr>
        <td>{{ $exp->amount }}</td>
        <td>{{ $exp->category }}</td>
        <td>{{ $exp->desc }}</td>
        <td>{{ $exp->date }}</td>
        <td>
            @if($exp->receipt_file)
                <a href="/storage/{{ $exp->receipt_file }}" target="_blank">{{ __('messages.view') }}</a>
            @endif
        </td>
        <td>
            <a href="{{ route('expenses.edit', $exp->id) }}" class="btn btn-warning btn-sm">{{ __('messages.edit') }}</a>

            <form action="{{ route('expenses.destroy', $exp->id) }}"
                  method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    {{ __('messages.delete') }}
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
