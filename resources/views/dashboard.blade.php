@extends('layout')
@section('title', 'Dashboard')
@section('content')
<h2>{{__('messages.dashboard')}}</h2>
<p>{{__('messages.welcome')}}, {{ auth()->user()->name }}!</p>

<div class="row mt-4">
    <div class="col-md-6">
        <a href="{{ route('income.index') }}" class="btn btn-success w-100">{{__('messages.manage') . ' ' . __('messages.income')}}</a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('expenses.index') }}" class="btn btn-danger w-100">{{__('messages.manage') . ' ' . __('messages.expenses')}}</a>
    </div>
</div>
@endsection
