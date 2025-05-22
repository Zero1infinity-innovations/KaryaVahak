<header>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top wow animate__animated animate__fadeInDown">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-warning" href="{{ route('home') }}">KaryaVahak</a>
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarNav">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-warning ms-3" href="{{ route('registerCompany') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
