@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div style="max-width: 500px; margin: 2rem auto;">
        <!-- Header Section -->
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="
                width: 80px;
                height: 80px;
                background: linear-gradient(135deg, #739EC9, #8fb3d4);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                color: white;
                font-size: 2rem;
                box-shadow: 0 8px 16px rgba(115, 158, 201, 0.3);
            ">👤</div>
            <h2 style="color: #739EC9; margin-bottom: 0.5rem;">Welcome Back!</h2>
            <p style="color: #718096; font-size: 1.1rem;">Sign in to continue to your account</p>
        </div>

        <!-- Alert Messages -->
        @if ($errors->has('email'))
            <div class="alert alert-error">
                <strong>Login Failed!</strong> {{ $errors->first('email') }}
            </div>
        @endif

        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <div>
                <label for="email">📧 Email Address</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       placeholder="Enter your email address"
                       required 
                       style="padding-left: 3rem; background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%23718096\" viewBox=\"0 0 24 24\"><path d=\"M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z\"/></svg>
            </div>
            
            <div>
                <label for="password">🔒 Password</label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       placeholder="Enter your password"
                       required
                       style="padding-left: 3rem; background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%23718096\" viewBox=\"0 0 24 24\"><path d=\"M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z\"/></svg>
            </div>

            <!-- Remember Me & Forgot Password -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <label style="display: flex; align-items: center; font-weight: normal; cursor: pointer;">
                    <input type="checkbox" name="remember" style="margin-right: 0.5rem; width: auto;">
                    <span style="color: #4a5568; font-size: 0.9rem;">Remember me</span>
                </label>
                <a href="#" style="color: #739EC9; font-size: 0.9rem; text-decoration: none;">
                    Forgot password?
                </a>
            </div>
            
            <button type="submit" style="position: relative;">
                <span>Sign In</span>
            </button>
        </form>

        <!-- Register Link -->
        <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e2e8f0;">
            <p style="color: #718096; margin-bottom: 1rem;">
                Don't have an account yet?
            </p>
            <a href="{{ route('register') }}" style="
                background: transparent;
                color: #739EC9;
                padding: 0.75rem 1.5rem;
                border: 2px solid #739EC9;
                border-radius: 8px;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
                display: inline-block;
            " onmouseover="this.style.background='#739EC9'; this.style.color='white'; this.style.transform='translateY(-2px)';" 
               onmouseout="this.style.background='transparent'; this.style.color='#739EC9'; this.style.transform='translateY(0)';">
                Create New Account
            </a>
        </div>

        <!-- Social Login (Optional) -->
        <div style="text-align: center; margin-top: 2rem;">
            <div style="position: relative; margin-bottom: 1.5rem;">
                <div style="position: absolute; top: 50%; left: 0; right: 0; height: 1px; background: #e2e8f0;"></div>
                <span style="background: #f7fafc; padding: 0 1rem; color: #718096; font-size: 0.9rem; position: relative;">
                    Or continue with
                </span>
            </div>
            
            <div style="display: flex; gap: 1rem; justify-content: center;">
                <button type="button" style="
                    background: white;
                    border: 2px solid #e2e8f0;
                    padding: 0.75rem;
                    border-radius: 8px;
                    width: auto;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                " onmouseover="this.style.borderColor='#739EC9'; this.style.transform='translateY(-2px)';"
                   onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)';">
                    <span style="font-size: 1.2rem;">🔍</span>
                    <span style="color: #4a5568; font-size: 0.9rem;">Google</span>
                </button>
                
                <button type="button" style="
                    background: white;
                    border: 2px solid #e2e8f0;
                    padding: 0.75rem;
                    border-radius: 8px;
                    width: auto;
                    cursor: pointer;
                    transition: all 0.3s ease;
                    display: flex;
                    align-items: center;
                    gap: 0.5rem;
                " onmouseover="this.style.borderColor='#739EC9'; this.style.transform='translateY(-2px)';"
                   onmouseout="this.style.borderColor='#e2e8f0'; this.style.transform='translateY(0)';">
                    <span style="font-size: 1.2rem;">📘</span>
                    <span style="color: #4a5568; font-size: 0.9rem;">Facebook</span>
                </button>
            </div>
        </div>
    </div>

    <style>
        /* Additional styles for login page */
        form input:focus {
            padding-left: 3rem !important;
        }
        
        /* Loading animation for submit button */
        form button[type="submit"]:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }
        
        form button[type="submit"]:disabled::after {
            content: '';
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
    </style>
@endsection