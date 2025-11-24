@extends('layout')
@section('title', 'Login')
@section('content')
<h3>Login</h3>

<form method="POST" action="/login">
    @csrf
    
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <button class="btn btn-primary w-100">Login</button>
</form>

<p class="mt-3 text-center">
    Don’t have an account? <a href="/register">Register</a>
</p>
@endsection
