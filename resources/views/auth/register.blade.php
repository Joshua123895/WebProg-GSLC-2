@extends('layout')
@section('title', __('messages.register'))
@section('content')
<div class="row justify-content-center mx-0">
    <div class="col-12 col-md-6 px-3">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-success text-white text-center py-4">
                <h4 class="mb-0">
                    <i class="fas fa-user-plus me-2"></i>{{ __('messages.register_title') }}
                </h4>
                <p class="mb-0 mt-2 opacity-75">{{ __('messages.register_subtitle') }}</p>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="/register">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('messages.full_name') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" name="name" class="form-control"
                                   placeholder="{{ __('messages.full_name_placeholder') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('messages.email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" class="form-control"
                                   placeholder="{{ __('messages.email_placeholder') }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ __('messages.password') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white">
                                <i class="fas fa-lock"></i>
                            </span>

                            <input type="password" name="password" id="password1" class="form-control"
                                   placeholder="{{ __('messages.password_create') }}" minlength="6"
                                   required>

                            <button type="button" class="input-group-text bg-success text-white"
                                    onclick="togglePassword('password1', 'eye1')">
                                <i id="eye1" class="fa-solid fa-eye"></i>
                            </button>
                        </div>

                        <label class="form-label small text-muted">
                            {{ __('messages.password_rule') }}
                        </label>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">{{ __('messages.confirm_password') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white">
                                <i class="fas fa-lock"></i>
                            </span>

                            <input type="password" name="password_confirmation" id="password2"
                                   class="form-control" minlength="6"
                                   placeholder="{{ __('messages.password_confirm') }}" required>

                            <button type="button" class="input-group-text bg-success text-white"
                                    onclick="togglePassword('password2', 'eye2')">
                                <i id="eye2" class="fa-solid fa-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button class="btn btn-success w-100 py-2 fw-bold fs-5">
                        <i class="fas fa-user-plus me-2"></i>{{ __('messages.register') }}
                    </button>
                </form>

                <div class="text-center mt-4 pt-3 border-top">
                    <p class="mb-0">
                        {{ __('messages.have_account') }}
                        <a href="/login" class="text-success fw-semibold text-decoration-none">
                            {{ __('messages.login_here') }}
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
        background: linear-gradient(135deg, #2ecc71, #27ae60) !important;
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
        border-color: #27ae60;
        box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
    }
    
    .btn {
        border-radius: 8px;
        transition: all 0.3s ease;
    }
    
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(39, 174, 96, 0.3);
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