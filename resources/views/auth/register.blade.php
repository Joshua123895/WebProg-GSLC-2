@extends('layout')
@section('title', 'Register')
@section('content')
<h3>Register</h3>

<form method="POST" action="/register">
    @csrf
    
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <button class="btn btn-success w-100">Register</button>
</form>

<p class="mt-3 text-center">
    Already have an account? <a href="/login">Login</a>
</p>
@endsection
