<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ? $title : 'Karyavahak ERP | Smart Software Solutions for Smarter Business' }}</title>
    <link rel="icon" href="">
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/mdb.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/custom-style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/font/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/js/jquery-3.7.1.min.js') }}" />
    <link rel="stylesheet" href="{{ URL::asset('frontend/assets/css/sweetalert2.min.css') }}" />
</head>

<body>
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
