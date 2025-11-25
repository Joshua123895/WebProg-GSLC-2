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
        <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" required>
            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword()">
                <i id="eyeIcon" class="bi bi-eye"></i>
            </button>
        </div>
        <div class="form-text">
            Password must have at least 6 characters.
        </div>
    </div>

    <button class="btn btn-primary w-100">Login</button>
</form>

<p class="mt-3 text-center">
    Don’t have an account? <a href="/register">Register</a>
</p>
@endsection
@section('script')
<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const icon = document.getElementById("eyeIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            passwordField.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
</script>
@endsection