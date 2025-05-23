@extends('Frontend.layouts.baseApp')
@section('section')
    <style>
        .reset-wrapper {
            min-height: 82vh;
        }

        .reset-image {
            background: url('{{ asset('frontend/assets/images/login/reset-password.png') }}') no-repeat center center;
            background-size: cover;
        }

        .reset-box {
            max-width: 450px;
            margin: auto;
        }
        .blur-background {
            filter: blur(3px);
            pointer-events: none;
        }
    </style>

    <div class="container reset-wrapper d-flex" id="formWrapper">
        <div class="row flex-grow-1 w-100">
            <div class="col-md-3"></div>
            <!-- Right Side Form -->
            <div class="col-md-6 d-flex align-items-center bg-light">
                <div class="reset-box w-100 px-4 wow fadeInRight" data-wow-delay="0.2s">
                    <h3 class="mb-4 text-center">Reset Your Password</h3>
                    <form method="POST" action="{{ route('resetPassword') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group mb-3">
                            <label for="password">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
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
