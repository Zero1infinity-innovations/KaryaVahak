<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ? $title : 'Karyavahak ERP | Smart Software Solutions for Smarter Business' }}</title>
    <link rel="icon" href="{{ URL::asset('frontend/assets/images/logo/logo.png') }}">
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/custom-style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/font/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/js/jquery-3.7.1.min.js') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/sweetalert2.min.css') }}" />
    <style>
        .loader-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #007bff, #00bcd4);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
            color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }

        .loader-content {
            animation: fadeIn 0.5s ease-in-out;
        }

        .loader-spinner {
            width: 60px;
            height: 60px;
            border: 6px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        .loader-brand {
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .loader-brand .text-highlight {
            color: #ffd700;
        }

        .loader-tagline {
            font-size: 14px;
            opacity: 0.9;
            margin-top: 4px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loader = document.getElementById('karyaVahakLoader');
            loader.classList.remove('d-none');

            window.addEventListener('load', () => {
                loader.classList.add('d-none');
            });
        });
    </script>
</head>

<body>
    <div id="karyaVahakLoader" class="loader-overlay d-none">
        <div class="loader-content text-center">
            <div class="loader-spinner mb-3"></div>
            <div class="loader-brand">Karya<span class="text-highlight">Vahak</span></div>
            <div class="loader-tagline">Empowering Smart Work</div>
        </div>
    </div>
    @include('Frontend.layouts.header')
    @yield('section')
    @include('Frontend.layouts.footer')
    <script src="{{ URL::asset('frontend/assets/js/mdb.umd.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/mdb.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/assets/js/SweetAlert2.js') }}"></script>
    <!-- Navbar Scroll Effect -->
    <script>
        new WOW().init();

        window.addEventListener("scroll", function() {
            let navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });
    </script>
</body>

</html>
