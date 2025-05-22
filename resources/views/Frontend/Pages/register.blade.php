@extends('Frontend.layouts.baseApp')
<style>
    #logoPreview {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border: 2px dashed #007bff;
        border-radius: 8px;
        margin-top: 10px;
        display: none;
    }

    .password-toggle {
        position: relative;
    }

    .toggle-icon {
        position: absolute;
        top: 71%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 15px;
        color: #6c757d;
    }

    .input-group {
        align-items: center;
    }

    .error {
        color: red;
        font-size: 0.875rem;
    }
</style>
@section('section')
    <div class="container mt-5">
        <div class="card mx-auto shadow wow animate__animated animate__fadeInUp" style="max-width: 600px;">
            <div class="card-header text-center bg-primary text-white">
                <h4>Register Your Company on Karyavahak</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" id="name" name="name" class="form-control" required
                            value="{{ old('name') }}" onkeyup="validateName()">
                        <div id="nameError" class="error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Email</label>
                        <input type="email" id="email" name="email" class="form-control" required
                            value="{{ old('email') }}" onkeyup="validateEmail()">
                        <div id="emailError" class="error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Phone</label>
                        <input type="text" id="phone" name="phone" maxlength="10" class="form-control" required
                            value="{{ old('phone') }}" onkeyup="validatePhone()">
                        <div id="phoneError" class="error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Address</label>
                        <textarea id="address" name="address" class="form-control" required
                            onkeyup="validateInput('address', 'addressError', 'Address is required')">{{ old('address') }}</textarea>
                        <div id="addressError" class="error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Logo</label>
                        <input type="file" name="logo" class="form-control" accept="image/*"
                            onchange="previewLogo(event)">
                        <img id="logoPreview" alt="Logo Preview">
                    </div>

                    <div class="mb-3 password-toggle">
                        <label class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required
                            onkeyup="checkPasswordsMatch()">
                        <i class="fas fa-eye-slash toggle-icon" id="togglePassword"
                            onclick="togglePassword('password', 'togglePassword')"></i>
                    </div>

                    <div class="mb-3 password-toggle">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                            required onkeyup="checkPasswordsMatch()">
                        <i class="fas fa-eye-slash toggle-icon" id="toggleConfirmPassword"
                            onclick="togglePassword('password_confirmation', 'toggleConfirmPassword')"></i>
                        <div id="passwordError" class="error"></div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-success">Register Company</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // image preview
        function previewLogo(event) {
            const input = event.target;
            const preview = document.getElementById('logoPreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        //password show hide 
        function togglePassword(id, iconId) {
            const input = document.getElementById(id);
            const icon = document.getElementById(iconId);
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }

        // validation
        function validateInput(id, errorId, message) {
            const input = document.getElementById(id);
            const error = document.getElementById(errorId);
            if (!input.value.trim()) {
                error.textContent = message;
            } else {
                error.textContent = '';
            }
        }

        // name
        function validateName() {
            const nameInput = document.getElementById('name');
            const nameError = document.getElementById('nameError');
            const companyNameRegex = /^[A-Za-z0-9&.,()\- ]{2,100}$/;
            if (!companyNameRegex.test(nameInput.value)) {
                nameError.textContent = 'Please enter a valid company name';
            } else {
                nameError.textContent = '';
            }
        }

        // email
        function validateEmail() {
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('emailError');
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(emailInput.value)) {
                emailError.textContent = 'Please enter a valid email';
            } else if (emailInput == "") {
                emailError.textContent = 'Email is required';
            } else {
                emailError.textContent = '';
            }
        }

        // mobile number
        function validatePhone() {
            const phoneInput = document.getElementById('phone');
            const phoneError = document.getElementById('phoneError');
            const phoneRegex = /^[6-9]\d{9}$/;
            if (!phoneRegex.test(phoneInput.value)) {
                phoneError.textContent = 'Please enter a valid Indian mobile number';
            } else if (phoneInput == "") {
                phoneError.textContent = 'Mobile number is required';
            } else {
                phoneError.textContent = '';
            }
        }


        function checkPasswordsMatch() {
            const pass = document.getElementById('password');
            const confirm = document.getElementById('password_confirmation');
            const error = document.getElementById('passwordError');
            if (pass.value !== confirm.value) {
                error.textContent = "Passwords do not match";
            } else {
                error.textContent = "";
            }
        }
    </script>
@endsection
