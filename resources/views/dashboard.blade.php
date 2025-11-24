@extends('layout')
@section('title', 'Dashboard')
@section('content')
<h2>Dashboard</h2>
<p>Welcome, {{ auth()->user()->name }}!</p>

<div class="row mt-4">
    <div class="col-md-6">
        <a href="{{ route('income.index') }}" class="btn btn-success w-100">Manage Income</a>
    </div>
    <div class="col-md-6">
        <a href="{{ route('expenses.index') }}" class="btn btn-danger w-100">Manage Expenses</a>
    </div>
</div>
@endsection
