@extends('layout')
@section('title', 'Dashboard')
@section('content')
<div class="welcome-header text-center">
    <h1><i class="fas fa-tachometer-alt me-2"></i>{{ __('messages.dashboard') }}</h1>
    <p class="lead mb-0">{{ __('messages.welcome') . ', ' . auth()->user()->name }}</p>
</div>

<div class="row mt-4">
    <div class="col-md-6 mb-3">
        <a href="{{ route('income.index') }}" class="btn btn-success w-100 p-4 card-hover d-flex align-items-center justify-content-center">
            <div class="text-center">
                <i class="fas fa-money-bill-wave fa-3x mb-3"></i>
                <h4>{{ __('messages.manage_income') }}</h4>
                <p class="mb-0 text-muted">{{ __('messages.manage_income_desc') }}</p>
            </div>
        </a>
    </div>

    <div class="col-md-6 mb-3">
        <a href="{{ route('expenses.index') }}" class="btn btn-danger w-100 p-4 card-hover d-flex align-items-center justify-content-center">
            <div class="text-center">
                <i class="fas fa-receipt fa-3x mb-3"></i>
                <h4>{{ __('messages.manage_expenses') }}</h4>
                <p class="mb-0 text-muted">{{ __('messages.manage_expenses_desc') }}</p>
            </div>
        </a>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card card-hover">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-lightbulb me-2"></i>{{ __('messages.quick_tips') }}
                </h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>{{ __('messages.tip1') }}</li>
                    <li><i class="fas fa-check text-success me-2"></i>{{ __('messages.tip2') }}</li>
                    <li><i class="fas fa-check text-success me-2"></i>{{ __('messages.tip3') }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection