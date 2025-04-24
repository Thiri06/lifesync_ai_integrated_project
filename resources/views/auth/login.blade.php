<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LifeSync') }} - Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNMTYgMkM4LjI2OCAyIDIgOC4yNjggMiAxNkMyIDIzLjczMiA4LjI2OCAzMCAxNiAzMEMyMy43MzIgMzAgMzAgMjMuNzMyIDMwIDE2QzMwIDguMjY4IDIzLjczMiAyIDE2IDJaIiBmaWxsPSIjZDM4ZGVkIiBmaWxsLW9wYWNpdHk9IjAuMSIvPjxwYXRoIGQ9Ik0xNiA2QzEwLjQ3NyA2IDYgMTAuNDc3IDYgMTZDNiAyMS41MjMgMTAuNDc3IDI2IDE2IDI2QzIxLjUyMyAyNiAyNiAyMS41MjMgMjYgMTZDMjYgMTAuNDc3IDIxLjUyMyA2IDE2IDZaIiBmaWxsPSIjZDM4ZGVkIiBmaWxsLW9wYWNpdHk9IjAuMiIvPjxwYXRoIGQ9Ik0xNiAxMEMxMi42ODYgMTAgMTAgMTIuNjg2IDEwIDE2QzEwIDE5LjMxNCAxMi42ODYgMjIgMTYgMjJDMTkuMzE0IDIyIDIyIDE5LjMxNCAyMiAxNkMyMiAxMi42ODYgMTkuMzE0IDEwIDE2IDEwWiIgZmlsbD0iI2QzOGRlZCIvPjxwYXRoIGQ9Ik0xNiAxNEMxNC44OTUgMTQgMTQgMTQuODk1IDE0IDE2QzE0IDE3LjEwNSAxNC44OTUgMTggMTYgMThDMTcuMTA1IDE4IDE4IDE3LjEwNSAxOCAxNkMxOCAxNC44OTUgMTcuMTA1IDE0IDE2IDE0WiIgZmlsbD0id2hpdGUiLz48cGF0aCBkPSJNMjQgOUMyNyAxMC4xMDQ2IDIzLjEwNDYgMTEgMjIgMTFDMjAuODk1NCAxMSAyMCAxMC4xMDQ2IDIwIDlDMjAgNy44OTU0MyAyMC44OTU0IDcgMjIgN0MyMy4xMDQ2IDcgMjQgNy44OTU0MyAyNCA5WiIgZmlsbD0iIzU5MmZkZSIvPjxwYXRoIGQ9Ik0xMiAyM0MxMiAyNC4xMDQ2IDExLjEwNDYgMjUgMTAgMjVDOC44OTU0MyAyNSA4IDI0LjEwNDYgOCAyM0M4IDIxLjg5NTQgOC44OTU0MyAyMSAxMCAyMUMxMS4xMDQ2IDIxIDEyIDIxLjg5NTQgMTIgMjNaIiBmaWxsPSIjNTkyZmRlIi8+PC9zdmc+" />

    <style>
        :root {
            --background: #f5eeff;
            --primary: #d38ded;
            --secondary: #592fde;
            --accent: #d959e5;
            --text: #070419;
            --light-text: rgba(7, 4, 25, 0.6);
            --border: rgba(7, 4, 25, 0.1);
            --card-bg: #ffffff;
            --input-bg: #ffffff;
            --error: #e74c3c;
            --success: #2ecc71;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-image: 
                radial-gradient(circle at 90% 10%, rgba(217, 89, 229, 0.08) 0%, transparent 25%),
                radial-gradient(circle at 10% 90%, rgba(89, 47, 222, 0.08) 0%, transparent 25%);
            background-attachment: fixed;
        }
        
        .login-container {
            max-width: 480px;
            width: 100%;
            margin: 40px auto;
        }
        
        .card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(211, 141, 237, 0.15);
            overflow: hidden;
            background-color: var(--card-bg);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(211, 141, 237, 0.2);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            text-align: center;
            padding: 35px 20px 30px;
            border-bottom: none;
            position: relative;
            overflow: hidden;
        }
        
        .card-header::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }
        
        .card-header::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -80px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: 1;
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }
        
        .logo-container svg {
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease;
        }
        
        .logo-container:hover svg {
            transform: scale(1.05) rotate(5deg);
        }
        
        .card-body {
            padding: 40px;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text);
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        
        .form-control {
            border-radius: 14px;
            padding: 14px 16px;
            border: 1px solid var(--border);
            background-color: var(--input-bg);
            transition: all 0.3s ease;
            font-size: 1rem;
            color: var(--text);
            height: auto;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(211, 141, 237, 0.15);
            background-color: rgba(255, 255, 255, 0.9);
        }
        
        .form-floating > .form-control {
            padding-top: 24px;
            padding-bottom: 8px;
        }
        
        .form-floating > label {
            padding: 14px 16px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            border: none;
            font-weight: 600;
            padding: 14px 28px;
            border-radius: 14px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(211, 141, 237, 0.25);
            width: 100%;
            margin-top: 15px;
            position: relative;
            overflow: hidden;
            font-size: 1rem;
        }
        
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: all 0.6s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(211, 141, 237, 0.35);
        }
        
        .btn-primary:hover::before {
            left: 100%;
        }
        
        .btn-primary:active {
            transform: translateY(0);
            box-shadow: 0 4px 10px rgba(211, 141, 237, 0.2);
        }
        
        .register-link {
            text-align: center;
            margin-top: 25px;
        }
        
        .register-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
        }
        
        .register-link a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -2px;
            left: 0;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            transition: width 0.3s ease;
            border-radius: 2px;
        }
        
        .register-link a:hover {
            color: var(--accent);
        }
        
        .register-link a:hover::after {
            width: 100%;
        }
        
        .invalid-feedback {
            color: var(--error);
            font-size: 0.85rem;
            margin-top: 6px;
            display: block;
            font-weight: 500;
        }
        
        .form-floating {
            margin-bottom: 22px;
        }
        
        .password-toggle {
            position: absolute;
            top: 50%;
            right: 16px;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--light-text);
            z-index: 10;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        .password-toggle:hover {
            color: var(--primary);
            background: rgba(255, 255, 255, 1);
        }
        
        .forgot-password {
            display: block;
            text-align: right;
            margin-top: -15px;
            margin-bottom: 20px;
        }
        
        .forgot-password a {
            color: var(--secondary);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .forgot-password a:hover {
            color: var(--accent);
            text-decoration: underline;
        }
        
        .back-link {
            display: inline-flex;
            align-items: center;
            color: var(--light-text);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: 20px;
            padding: 8px 16px;
            border-radius: 12px;
        }
        
        .back-link:hover {
            color: var(--primary);
            background-color: rgba(211, 141, 237, 0.05);
            transform: translateX(-5px);
        }
        
        .back-link i {
            margin-right: 8px;
             transition: transform 0.3s ease;
        }

        .back-link:hover i {
            transform: translateX(-3px);
        }
        
        .form-check {
            margin-top: 5px;
            margin-bottom: 20px;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .form-check-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(211, 141, 237, 0.25);
            border-color: var(--primary);
        }
        
        .form-check-label {
            font-size: 0.9rem;
            color: var(--light-text);
        }
        
        .card-title {
            font-weight: 800;
            font-size: 1.8rem;
            margin-bottom: 5px;
            position: relative;
            z-index: 2;
        }
        
        .card-subtitle {
            font-size: 1rem;
            opacity: 0.8;
            margin-bottom: 0;
            position: relative;
            z-index: 2;
        }
        
        .alert {
            border-radius: 14px;
            padding: 15px;
            margin-bottom: 20px;
            border: none;
            background-color: rgba(211, 141, 237, 0.1);
            color: var(--primary);
            font-weight: 500;
        }
        
        .social-login {
            margin-top: 25px;
            text-align: center;
            position: relative;
        }
        
        .social-login::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: var(--border);
            z-index: 1;
        }
        
        .social-login-text {
            display: inline-block;
            padding: 0 15px;
            background-color: white;
            position: relative;
            z-index: 2;
            color: var(--light-text);
            font-size: 0.9rem;
        }
        
        .social-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 55px;
        }
        
        .social-button {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            border: 1px solid var(--border);
            color: var(--text);
            transition: all 0.3s ease;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            text-decoration: none;
        }
        
        .social-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }
        
        .social-button.google:hover {
            color: #DB4437;
            border-color: #DB4437;
        }
        
        .social-button.facebook:hover {
            color: #4267B2;
            border-color: #4267B2;
        }
        
        .social-button.twitter:hover {
            color: #1DA1F2;
            border-color: #1DA1F2;
        }
        
        @media (max-width: 576px) {
            .card-body {
                padding: 30px 20px;
            }
            
            .card-header {
                padding: 25px 15px 20px;
            }
            
            .card-title {
                font-size: 1.5rem;
            }
            
            .form-floating {
                margin-bottom: 18px;
            }
            
            .btn-primary {
                padding: 12px 20px;
            }
        }
        
        /* Animation for form elements */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .form-floating, .form-check, .btn-primary, .forgot-password, .register-link, .social-login {
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }
        
        .form-floating:nth-child(1) { animation-delay: 0.1s; }
        .form-floating:nth-child(2) { animation-delay: 0.2s; }
        .form-check { animation-delay: 0.3s; }
        .forgot-password { animation-delay: 0.3s; }
        .btn-primary { animation-delay: 0.4s; }
        .social-login { animation-delay: 0.5s; }
        .register-link { animation-delay: 0.6s; }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card">
            <div class="card-header">
                <div class="logo-container">
                    <svg width="50" height="50" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 2C8.268 2 2 8.268 2 16C2 23.732 8.268 30 16 30C23.732 30 30 23.732 30 16C30 8.268 23.732 2 16 2Z" fill="white" fill-opacity="0.1"/>
                        <path d="M16 6C10.477 6 6 10.477 6 16C6 21.523 10.477 26 16 26C21.523 26 26 21.523 26 16C26 10.477 21.523 6 16 6Z" fill="white" fill-opacity="0.2"/>
                        <path d="M16 10C12.686 10 10 12.686 10 16C10 19.314 12.686 22 16 22C19.314 22 22 19.314 22 16C22 12.686 19.314 10 16 10Z" fill="white"/>
                        <path d="M16 14C14.895 14 14 14.895 14 16C14 17.105 14.895 18 16 18C17.105 18 18 17.105 18 16C18 14.895 17.105 14 16 14Z" fill="#d38ded"/>
                        <path d="M24 9C24 10.1046 23.1046 11 22 11C20.8954 11 20 10.1046 20 9C20 7.89543 20.8954 7 22 7C23.1046 7 24 7.89543 24 9Z" fill="white"/>
                        <path d="M12 23C12 24.1046 11.1046 25 10 25C8.89543 25 8 24.1046 8 23C8 21.8954 8.89543 21 10 21C11.1046 21 12 21.8954 12 23Z" fill="white"/>
                    </svg>
                </div>
                <h2 class="card-title text-center">Welcome Back</h2>
                <p class="card-subtitle text-center">Sign in to continue your wellness journey</p>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                        <label for="email">Email Address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-floating mb-3 position-relative">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        <span class="password-toggle" onclick="togglePassword('password')">
                            <i class="far fa-eye"></i>
                        </span>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">
                            Remember me
                        </label>
                    </div>

                    <!-- Forgot Password -->
                    @if (Route::has('password.request'))
                        <div class="forgot-password">
                            <a href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt me-2"></i>Sign In
                    </button>
                </form>

                <!-- Social Login -->
                <div class="social-login">
                    <span class="social-login-text">Or sign in with</span>
                    <div class="social-buttons">
                        <a href="#" class="social-button google">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-button facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-button twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>

                <div class="register-link">
                    <p>Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="/" class="back-link">
                <i class="fas fa-arrow-left"></i> Back to Home
            </a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const icon = event.currentTarget.querySelector('i');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>