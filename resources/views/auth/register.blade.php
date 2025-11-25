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
        <div class="input-group">
            <input type="password" name="password" id="password" class="form-control" minlength="6" required>
            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password', 'eye1')">
                <i id="eye1" class="bi bi-eye"></i>
            </button>
        </div>
        <div class="form-text">
            Password must have at least 6 characters.
        </div>
    </div>

    <div class="mb-3">
        <label>Confirm Password</label>
        <div class="input-group">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" minlength="6" required>
            <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('password_confirmation', 'eye2')">
                <i id="eye2" class="bi bi-eye"></i>
            </button>
        </div>
    </div>

    <button class="btn btn-success w-100">Register</button>
</form>

<p class="mt-3 text-center">
    Already have an account? <a href="/login">Login</a>
</p>
@endsection
@section('script')
<script>
    function togglePassword(fieldId, iconId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(iconId);

        if (field.type === "password") {
            field.type = "text";
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        } else {
            field.type = "password";
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
</script>
@endsection