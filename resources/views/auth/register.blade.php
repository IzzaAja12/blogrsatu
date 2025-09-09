@extends('layouts.app')

@section('title', 'Register')

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
            ">✨</div>
            <h2 style="color: #739EC9; margin-bottom: 0.5rem;">Join Our Community!</h2>
            <p style="color: #718096; font-size: 1.1rem;">Create your account and start your blogging journey</p>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Registration Form -->
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div>
                <label for="name">👤 Full Name</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
                       placeholder="Enter your full name"
                       required
                       style="padding-left: 3rem; background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%23718096\" viewBox=\"0 0 24 24\"><path d=\"M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 4V6L21 9ZM3 7V9L9 6V4L3 7ZM15 10C15.8 10 16.5 10.4 16.9 11H21V13H16.9C16.5 13.6 15.8 14 15 14C14.2 14 13.5 13.6 13.1 13H7.1C6.7 13.6 6 14 5.2 14C4.4 14 3.7 13.6 3.3 13H1V11H3.3C3.7 10.4 4.4 10 5.2 10C6 10 6.7 10.4 7.1 11H13.1C13.5 10.4 14.2 10 15 10ZM12 7C15.3 7 18 9.7 18 13V21H6V13C6 9.7 8.7 7 12 7Z\"/></svg>
                @error('name')
                    <small style="color: #f56565; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                @enderror
            </div>
            
            <div>
                <label for="email">📧 Email Address</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}"
                       placeholder="Enter your email address"
                       required
                       style="padding-left: 3rem; background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%23718096\" viewBox=\"0 0 24 24\"><path d=\"M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.89 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z\"/></svg>
                @error('email')
                    <small style="color: #f56565; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                @enderror
            </div>
            
            <div>
                <label for="password">🔒 Password</label>
                <div style="position: relative;">
                    <input type="password" 
                           id="password" 
                           name="password" 
                           placeholder="Create a strong password"
                           required
                           style="padding-left: 3rem; padding-right: 3rem; background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%23718096\" viewBox=\"0 0 24 24\"><path d=\"M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z\"/></svg>
                           onkeyup="checkPasswordStrength(this.value)">
                    <button type="button" 
                            onclick="togglePassword('password')" 
                            style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #718096; cursor: pointer; font-size: 1.2rem;">
                        👁️
                    </button>
                </div>
                <!-- Password Strength Indicator -->
                <div id="password-strength" style="margin-top: 0.5rem; height: 4px; background: #e2e8f0; border-radius: 2px; overflow: hidden;">
                    <div id="strength-bar" style="height: 100%; width: 0%; transition: all 0.3s ease; background: #f56565;"></div>
                </div>
                <small id="strength-text" style="color: #718096; font-size: 0.8rem; margin-top: 0.25rem; display: block;">Password strength: Weak</small>
                @error('password')
                    <small style="color: #f56565; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                @enderror
            </div>
            
            <div>
                <label for="password_confirmation">🔒 Confirm Password</label>
                <div style="position: relative;">
                    <input type="password" 
                           id="password_confirmation" 
                           name="password_confirmation" 
                           placeholder="Confirm your password"
                           required
                           style="padding-left: 3rem; padding-right: 3rem; background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" fill=\"%23718096\" viewBox=\"0 0 24 24\"><path d=\"M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z\"/></svg>'); background-repeat: no-repeat; background-position: 12px center; background-size: 20px;"
                           onkeyup="checkPasswordMatch()">
                    <button type="button" 
                            onclick="togglePassword('password_confirmation')" 
                            style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: #718096; cursor: pointer; font-size: 1.2rem;">
                        👁️
                    </button>
                </div>
                <small id="password-match" style="color: #718096; font-size: 0.8rem; margin-top: 0.25rem; display: block;"></small>
                @error('password_confirmation')
                    <small style="color: #f56565; font-size: 0.875rem; margin-top: 0.25rem; display: block;">{{ $message }}</small>
                @enderror
            </div>

            <!-- Terms and Conditions -->
            <div style="margin-bottom: 1.5rem;">
                <label style="display: flex; align-items: flex-start; font-weight: normal; cursor: pointer; gap: 0.5rem;">
                    <input type="checkbox" name="terms" required style="margin-top: 0.25rem; width: auto;">
                    <span style="color: #4a5568; font-size: 0.9rem; line-height: 1.4;">
                        I agree to the <a href="#" style="color: #739EC9;">Terms of Service</a> and <a href="#" style="color: #739EC9;">Privacy Policy</a>
                    </span>
                </label>
            </div>
            
            <button type="submit" id="register-btn" style="position: relative;" disabled>
                <span>Create Account</span>
            </button>
        </form>

        <!-- Login Link -->
        <div style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid #e2e8f0;">
            <p style="color: #718096; margin-bottom: 1rem;">
                Already have an account?
            </p>
            <a href="{{ route('login') }}" style="
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
                Sign In Instead
            </a>
        </div>
    </div>

    <script>
        // Password strength checker
        function checkPasswordStrength(password) {
            const strengthBar = document.getElementById('strength-bar');
            const strengthText = document.getElementById('strength-text');
            const registerBtn = document.getElementById('register-btn');
            let strength = 0;
            let feedback = '';

            if (password.length >= 8) strength += 25;
            if (password.match(/[a-z]/)) strength += 25;
            if (password.match(/[A-Z]/)) strength += 25;
            if (password.match(/[0-9]/)) strength += 25;
            if (password.match(/[^a-zA-Z0-9]/)) strength += 25;

            strengthBar.style.width = Math.min(strength, 100) + '%';

            if (strength < 25) {
                strengthBar.style.background = '#f56565';
                feedback = 'Very Weak';
            } else if (strength < 50) {
                strengthBar.style.background = '#ed8936';
                feedback = 'Weak';
            } else if (strength < 75) {
                strengthBar.style.background = '#ecc94b';
                feedback = 'Fair';
            } else if (strength < 100) {
                strengthBar.style.background = '#68d391';
                feedback = 'Good';
            } else {
                strengthBar.style.background = '#48bb78';
                feedback = 'Strong';
            }

            strengthText.textContent = 'Password strength: ' + feedback;
            checkFormValidity();
        }

        // Password match checker
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchText = document.getElementById('password-match');

            if (confirmPassword === '') {
                matchText.textContent = '';
                matchText.style.color = '#718096';
            } else if (password === confirmPassword) {
                matchText.textContent = '✓ Passwords match';
                matchText.style.color = '#48bb78';
            } else {
                matchText.textContent = '✗ Passwords do not match';
                matchText.style.color = '#f56565';
            }
            checkFormValidity();
        }

        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const button = field.nextElementSibling;
            
            if (field.type === 'password') {
                field.type = 'text';
                button.textContent = '🙈';
            } else {
                field.type = 'password';
                button.textContent = '👁️';
            }
        }

        // Check form validity
        function checkFormValidity() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const terms = document.querySelector('input[name="terms"]').checked;
            const registerBtn = document.getElementById('register-btn');

            const isValid = password.length >= 8 && 
                           password === confirmPassword && 
                           name.trim() !== '' && 
                           email.trim() !== '' && 
                           terms;

            registerBtn.disabled = !isValid;
            registerBtn.style.opacity = isValid ? '1' : '0.6';
        }

        // Add event listeners
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('input', checkFormValidity);
                input.addEventListener('change', checkFormValidity);
            });
        });
    </script>

    <style>
        /* Additional styles for register page */
        form input:focus {
            padding-left: 3rem !important;
        }
        
        form button[type="submit"]:disabled {
            cursor: not-allowed;
            background: #a0aec0 !important;
        }
        
        form button[type="submit"]:disabled:hover {
            transform: none !important;
            box-shadow: none !important;
        }
    </style>
@endsection