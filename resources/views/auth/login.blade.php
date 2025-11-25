@extends('layout')
@section('title', 'Login')
@section('content')
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-6 px-3">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-4">
                <h4 class="mb-0"><i class="fas fa-sign-in-alt me-2"></i>Welcome Back</h4>
                <p class="mb-0 mt-2 opacity-75">Sign in to your account</p>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="/login">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 py-2 fw-bold fs-5">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                </form>

                <div class="text-center mt-4 pt-3 border-top">
                    <p class="mb-0">
                        Don't have an account? 
                        <a href="/register" class="text-primary fw-semibold text-decoration-none">Register here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        margin-top: 2rem;
        border: none;
    }
    
    .card-header {
        border-radius: 0.75rem 0.75rem 0 0 !important;
        background: linear-gradient(135deg, #4361ee, #3a0ca3) !important;
    }
    
    .input-group-text {
        border: none;
        min-width: 45px;
        justify-content: center;
    }
    
    .form-control {
        border-left: none;
    }
    
    .form-control:focus {
        border-color: #4361ee;
        box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
    }
    
    .btn {
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    }
</style>
@endsection