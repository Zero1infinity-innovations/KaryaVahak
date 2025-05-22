@extends('Frontend.layouts.baseApp')
@section('section')
    <section class="hero-section text-center wow animate__animated animate__fadeIn" id="about">
        <div class="container">
            <h2 class="display-5 fw-bold mb-4">Smart ERP for Your Business Growth</h2>
            <p class="lead mb-4">
                KaryaVahak is an all-in-one ERP solution designed to simplify project management, HR, payroll, and
                attendance for multiple companies — all under one roof.
                Manage your teams, tasks, leaves, and payroll with ease and scale your business efficiently.
            </p>
            <a href="{{ route('registerCompany') }}" class="btn btn-warning btn-lg">Register Your Company</a>
        </div>
    </section>

    <section class="py-5 wow animate__animated animate__fadeInUp" id="features">
        <div class="container">
            <h3 class="text-center text-dark fw-bold mb-5">Key Features</h3>
            <div class="row g-4">
                <div class="col-md-4 wow animate__animated animate__zoomIn">
                    <div class="card feature-card shadow-sm h-100 text-center p-4">
                        <i class="fas fa-building feature-icon mb-2"></i>
                        <h5 class="card-title text-primary">Multi-Company Support</h5>
                        <p class="card-text">Run multiple companies independently with role-based access and data
                            segregation.</p>
                    </div>
                </div>
                <div class="col-md-4 wow animate__animated animate__zoomIn" data-wow-delay="0.1s">
                    <div class="card feature-card shadow-sm h-100 text-center p-4">
                        <i class="fas fa-user-shield feature-icon mb-2"></i>
                        <h5 class="card-title text-primary">Role-Based Access</h5>
                        <p class="card-text">Define roles like Boss, Manager, HR, Team Lead & Employee with specific
                            permissions.</p>
                    </div>
                </div>
                <div class="col-md-4 wow animate__animated animate__zoomIn" data-wow-delay="0.2s">
                    <div class="card feature-card shadow-sm h-100 text-center p-4">
                        <i class="fas fa-tasks feature-icon mb-2"></i>
                        <h5 class="card-title text-primary">Project & Task Management</h5>
                        <p class="card-text">Assign, track, and manage projects and tasks effectively to boost productivity.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow animate__animated animate__zoomIn" data-wow-delay="0.3s">
                    <div class="card feature-card shadow-sm h-100 text-center p-4">
                        <i class="fas fa-calendar-check feature-icon mb-2"></i>
                        <h5 class="card-title text-primary">Attendance & Leave</h5>
                        <p class="card-text">Automated attendance tracking and leave approval workflows for streamlined HR.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 wow animate__animated animate__zoomIn" data-wow-delay="0.4s">
                    <div class="card feature-card shadow-sm h-100 text-center p-4">
                        <i class="fas fa-money-check-alt feature-icon mb-2"></i>
                        <h5 class="card-title text-primary">Payroll & Salary</h5>
                        <p class="card-text">Manage employee payroll with salary slips, monthly reports, and payment
                            history.</p>
                    </div>
                </div>
                <div class="col-md-4 wow animate__animated animate__zoomIn" data-wow-delay="0.5s">
                    <div class="card feature-card shadow-sm h-100 text-center p-4">
                        <i class="fas fa-chart-line feature-icon mb-2"></i>
                        <h5 class="card-title text-primary">Reports & Analytics</h5>
                        <p class="card-text">Get real-time insights on project status, employee performance, and company
                            growth.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
