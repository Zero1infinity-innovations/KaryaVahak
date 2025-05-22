<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// For Frontend
Route::get("/", [HomeController::class, 'index'])->name("home");
Route::get("register-your-company", [HomeController::class, "RegisterYourCompany"])->name("registerCompany");
