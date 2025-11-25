@extends('layout')
@section('title', __('messages.login'))
@section('content')
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-6 px-3">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center py-4">
                <h4 class="mb-0">
                    <i class="fas fa-sign-in-alt me-2"></i>{{ __('messages.login_title') }}
                </h4>
                <p class="mb-0 mt-2 opacity-75">{{ __('messages.login_subtitle') }}</p>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="/login">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('messages.email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control"
                                   placeholder="{{ __('messages.email_placeholder') }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">{{ __('messages.password') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-primary text-white">
                                <i class="fas fa-lock"></i>
                            </span>

                            <input type="password" name="password" id="password"
                                   class="form-control" minlength="6"
                                   placeholder="{{ __('messages.password_placeholder') }}" required>

                            <button type="button" class="input-group-text bg-primary text-white"
                                    onclick="togglePassword('password', 'eye')">
                                <i id="eye" class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 py-2 fw-bold fs-5">
                        <i class="fas fa-sign-in-alt me-2"></i>{{ __('messages.login') }}
                    </button>
                </form>

                <div class="text-center mt-4 pt-3 border-top">
                    <p class="mb-0">
                        {{ __('messages.no_account') }}
                        <a href="/register" class="text-primary fw-semibold text-decoration-none">
                            {{ __('messages.register_here') }}
                        </a>
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

<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
@endsection