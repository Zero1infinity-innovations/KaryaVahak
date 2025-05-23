@extends('Frontend.layouts.baseApp')
@section('section')
    <style>
        .login-wrapper {
            min-height: 82vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }

        .login-image {
            background: linear-gradient(rgba(0, 0, 0, 0.4),
                    rgba(0, 0, 0, 0.4)),
                url('{{ asset('frontend/assets/images/login/login-page2.webp') }}') no-repeat center center;
            background-size: cover;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .login-card {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .login-form-container {
            padding: 3rem;
            background-color: #ffffff;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .login-title {
            font-weight: bold;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #343a40;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }

        .btn-login {
            background-color: #0d6efd;
            color: #fff;
            transition: 0.3s ease;
        }

        .btn-login:hover {
            background-color: #d7a10b;
        }

        .remember-me label {
            font-size: 0.9rem;
            color: #6c757d;
        }

        .forgot-password {
            font-size: 0.9rem;
            color: #0d6efd;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (Session::has('success'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @elseif (Session::has('error'))
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    title: '{{ Session::get('error') }}',
                    showConfirmButton: false,
                    timer: 3000
                });
            @endif
        });
    </script>
    <section class="container login-wrapper d-flex align-items-center">
        <div class="row w-100">
            <!-- Left Side Image -->
            <div class="col-md-6 d-none d-md-block login-image"></div>

            <!-- Right Side Form -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <div class="card shadow-4 rounded-5 p-4 w-75">
                    <h4 class="mb-4 text-center fw-bold">Welcome Back</h4>
                    <form method="POST" action="">
                        @csrf

                        <!-- Email input -->
                        <div class="form-outline mb-4" data-mdb-input-init>
                            <input type="email" id="email" name="email" class="form-control" required />
                            <label class="form-label" for="email">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4" data-mdb-input-init>
                            <input type="password" id="password" name="password" class="form-control" required />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <!-- Remember Me + Forgot Password -->
                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember"
                                    name="remember" />
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                            <a href="{{ route('forgetPassword') }}">Forgot password?</a>
                        </div>

                        <!-- Submit button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block w-100" id="loginBtn">
                                <span id="loginSpinner" class="spinner-border spinner-border-sm me-2 d-none" role="status"
                                    aria-hidden="true"></span>
                                <span id="loginText">Login</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Optional: show spinner on submit
        document.addEventListener("DOMContentLoaded", function() {
            const loginBtn = document.getElementById("loginBtn");
            const loginSpinner = document.getElementById("loginSpinner");
            const loginText = document.getElementById("loginText");

            loginBtn.addEventListener("click", function() {
                loginBtn.disabled = true;
                loginSpinner.classList.remove("d-none");
                loginText.textContent = "Logging in...";
            });
        });
    </script>
@endsection
