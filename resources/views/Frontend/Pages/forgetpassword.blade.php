@extends('Frontend.layouts.baseApp')
@section('section')
    <style>
        .forgot-wrapper {
            min-height: 82vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }

        .forgot-container {
            display: flex;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 100%;
        }

        .forgot-image {
            flex: 1;
            background: url('{{ asset('frontend/assets/images/login/forgot-password.png') }}') no-repeat center;
            background-size: cover;
        }

        .forgot-form {
            flex: 1;
            padding: 40px;
        }

        .blur-background {
            filter: blur(3px);
            pointer-events: none;
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
    <div class="forgot-wrapper">
        <div class="forgot-container" id="formWrapper">
            <!-- Image Side -->
            <div class="forgot-image d-none d-md-block wow fadeInLeft" data-wow-duration="1s"></div>

            <!-- Form Side -->
            <div class="forgot-form wow fadeInRight" data-wow-duration="1s">
                <h3 class="mb-4 text-center">Forgot Password</h3>
                <form action="{{ route('resetLink') }}" id="forget-password-form" method="POST">
                    @csrf

                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="email" class="form-control" required />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block w-100 mb-3" id="resetBtn">
                        <span id="resetSpinner" class="spinner-border spinner-border-sm me-2 d-none" role="status"
                            aria-hidden="true"></span>
                        <span id="resetText">Send Reset Link</span>
                    </button>

                    <div class="text-center">
                        <a href="{{ route('loginCompany') }}">Back to Login</a>
                    </div>
                </form>
            </div>
        </div>
        <div id="fullPageSpinner"
            class="d-none position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex justify-content-center align-items-center"
            style="z-index: 9999;">
            <div class="text-center text-white">
                <div class="spinner-border text-light" role="status" style="width: 3rem; height: 3rem;"></div>
                <div class="mt-3 fs-5">Processing...</div>
            </div>
        </div>
    </div>
    <script>
        // Optional: show spinner on submit
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("forget-password-form");
            form.addEventListener("submit", function() {
                document.getElementById("fullPageSpinner").classList.remove("d-none");
                document.getElementById("resetBtn").disabled = true;

                // Optional blur
                const wrapper = document.getElementById("formWrapper");
                if (wrapper) wrapper.classList.add("blur-background");
            });
        });
    </script>
@endsection
