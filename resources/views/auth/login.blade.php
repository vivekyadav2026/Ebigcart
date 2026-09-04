@extends('layouts.frontend')

@section('title', 'Customer Login')

@section('content')
<style>
    .auth-page-wrapper {
        min-height: 75vh !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 40px 16px !important;
        background: #f8fafc !important;
        font-family: 'Outfit', sans-serif !important;
    }
    .auth-card {
        width: 100% !important;
        max-width: 440px !important;
        background: #ffffff !important;
        border: 1px solid #e2e8f0 !important;
        border-radius: 20px !important;
        padding: 36px 32px !important;
        box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08), 0 4px 6px -2px rgba(15, 23, 42, 0.03) !important;
        box-sizing: border-box !important;
    }
    @media (max-width: 480px) {
        .auth-card {
            padding: 24px 20px !important;
            border-radius: 16px !important;
        }
    }
    .auth-title {
        font-size: 24px !important;
        font-weight: 800 !important;
        color: #0f172a !important;
        margin: 0 0 6px 0 !important;
        text-align: center !important;
        letter-spacing: -0.02em !important;
    }
    .auth-subtitle {
        font-size: 13px !important;
        color: #64748b !important;
        margin: 0 0 24px 0 !important;
        text-align: center !important;
    }
    .auth-google-btn {
        width: 100% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 12px !important;
        background: #ffffff !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 12px !important;
        padding: 11px 16px !important;
        font-size: 13px !important;
        font-weight: 700 !important;
        color: #334155 !important;
        text-decoration: none !important;
        box-shadow: 0 1px 2px rgba(0,0,0,0.04) !important;
        transition: all 0.2s ease !important;
        box-sizing: border-box !important;
    }
    .auth-google-btn:hover {
        background: #f8fafc !important;
        border-color: #94a3b8 !important;
        color: #0f172a !important;
    }
    .auth-divider {
        display: flex !important;
        align-items: center !important;
        margin: 20px 0 !important;
        text-align: center !important;
    }
    .auth-divider::before, .auth-divider::after {
        content: '' !important;
        flex: 1 !important;
        border-bottom: 1px solid #e2e8f0 !important;
    }
    .auth-divider span {
        padding: 0 14px !important;
        font-size: 11px !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        color: #94a3b8 !important;
        letter-spacing: 0.05em !important;
    }
    .auth-form-group {
        margin-bottom: 16px !important;
        text-align: left !important;
    }
    .auth-label {
        display: block !important;
        font-size: 11px !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        color: #475569 !important;
        margin-bottom: 6px !important;
    }
    .auth-input {
        width: 100% !important;
        background: #ffffff !important;
        border: 1px solid #cbd5e1 !important;
        border-radius: 12px !important;
        padding: 11px 14px !important;
        font-size: 13px !important;
        color: #0f172a !important;
        outline: none !important;
        transition: all 0.2s ease !important;
        box-sizing: border-box !important;
        font-family: inherit !important;
    }
    .auth-input:focus {
        border-color: #b71c1c !important;
        box-shadow: 0 0 0 3px rgba(183, 28, 28, 0.12) !important;
    }
    .auth-pass-wrap {
        position: relative !important;
        width: 100% !important;
    }
    .auth-pass-toggle {
        position: absolute !important;
        right: 12px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        background: transparent !important;
        border: none !important;
        color: #94a3b8 !important;
        font-size: 14px !important;
        cursor: pointer !important;
        padding: 4px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        box-shadow: none !important;
    }
    .auth-pass-toggle:hover {
        color: #b71c1c !important;
    }
    .auth-submit-btn {
        width: 100% !important;
        background: #b71c1c !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 12px !important;
        padding: 13px !important;
        font-size: 13px !important;
        font-weight: 800 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        cursor: pointer !important;
        box-shadow: 0 4px 12px rgba(183, 28, 28, 0.3) !important;
        transition: all 0.2s ease !important;
        margin-top: 8px !important;
        box-sizing: border-box !important;
    }
    .auth-submit-btn:hover {
        background: #8e1515 !important;
        box-shadow: 0 6px 16px rgba(183, 28, 28, 0.4) !important;
        transform: translateY(-1px) !important;
    }
</style>

<div class="auth-page-wrapper">
    <div class="auth-card">
        
        <h1 class="auth-title">Welcome Back</h1>
        <p class="auth-subtitle">Log in to manage your orders, wishlist, and account.</p>

        <!-- Status & Error Alert -->
        @if (session('status'))
            <div style="background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; padding: 10px 14px; border-radius: 10px; font-size: 12px; font-weight: 600; margin-bottom: 16px; text-align: center;">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background: #fef2f2; border: 1px solid #fecaca; color: #991b1b; padding: 10px 14px; border-radius: 10px; font-size: 12px; margin-bottom: 16px;">
                @foreach ($errors->all() as $error)
                    <div style="display: flex; align-items: center; gap: 6px;">
                        <i class="fa-solid fa-circle-exclamation" style="font-size: 12px;"></i>
                        <span>{{ $error }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- Google OAuth Button -->
        <a href="{{ route('auth.google') }}" class="auth-google-btn">
            <svg style="width: 18px; height: 18px;" viewBox="0 0 48 48">
                <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
                <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
                <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
                <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
                <path fill="none" d="M0 0h48v48H0z"></path>
            </svg>
            Continue with Google
        </a>

        <!-- Divider -->
        <div class="auth-divider">
            <span>OR</span>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="auth-form-group">
                <label for="email" class="auth-label">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="auth-input" placeholder="name@example.com">
            </div>

            <!-- Password -->
            <div class="auth-form-group" x-data="{ showPassword: false }">
                <label for="password" class="auth-label">Password</label>
                <div class="auth-pass-wrap">
                    <input id="password" :type="showPassword ? 'text' : 'password'" name="password" required autocomplete="current-password" class="auth-input" style="padding-right: 40px !important;" placeholder="Enter your password">
                    <button type="button" @click="showPassword = !showPassword" class="auth-pass-toggle" title="Toggle Password Visibility">
                        <i class="fa-solid" :class="showPassword ? 'fa-eye-slash' : 'fa-eye'"></i>
                    </button>
                </div>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; font-size: 12px;">
                <label for="remember_me" style="display: flex; align-items: center; gap: 8px; cursor: pointer; color: #475569; font-weight: 600; margin: 0;">
                    <input id="remember_me" type="checkbox" name="remember" style="width: 15px; height: 15px; accent-color: #b71c1c; cursor: pointer; margin: 0;">
                    <span>Remember me</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="color: #b71c1c; font-weight: 700; text-decoration: none;">
                        Forgot password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="auth-submit-btn">
                Log In
            </button>
        </form>

        <div style="margin-top: 24px; padding-top: 16px; border-top: 1px solid #f1f5f9; text-align: center; font-size: 13px; color: #64748b;">
            <span>Don't have an account?</span>
            <a href="{{ route('register') }}" style="color: #b71c1c; font-weight: 800; text-decoration: none; margin-left: 4px;">
                Register here
            </a>
        </div>

    </div>
</div>
@endsection
