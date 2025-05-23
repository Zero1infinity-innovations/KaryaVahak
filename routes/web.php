<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// For Frontend
Route::get("/", [HomeController::class, 'index'])->name("home");
Route::get("login-your-company", [HomeController::class, "LoginYourCompany"])->name("loginCompany");
Route::get("register-your-company", [HomeController::class, "RegisterYourCompany"])->name("registerCompany");
Route::POST("store-your-company", [HomeController::class, "StoreYourCompany"])->name("storeCompany");
Route::get("forget-password", [HomeController::class, "ForgetPassword"])->name("forgetPassword");
Route::post("sending-reset-link", [HomeController::class, "SendResetLink"])->name("resetLink");
Route::get('reset-password-form', [HomeController::class, 'showResetForm'])->name('resetPasswordForm');
Route::post('reset-password', [HomeController::class, 'submitResetPassword'])->name('resetPassword');
