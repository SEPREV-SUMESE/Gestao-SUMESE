<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware("guest")->group(function(){
    Route::view("login", "guest.login")->name("login");
    Route::view("register", "guest.register")->name("register");

    Route::post("register", [UserController::class, "register"])->name("user.register");
    Route::post("authenticate", [AuthController::class, "authenticate"])->name("authenticate");

    Route::view("forgot_password", "guest.forgot-password")->name("forgot_password");
    Route::post("password-request", [PasswordResetController::class, 'password_request'])->name('password.request');
    Route::get('password-reset/{token}', [PasswordResetController::class, 'password_reset'])->name('password.reset');
    Route::put("password-update", [PasswordResetController::class, 'password_update'])->name('password.update');
});

Route::middleware("auth")->group(function(){
    Route::get("/", HomeController::class)->name("dashboard");
    Route::post("logout", [AuthController::class, "logout"])->name("logout");

    Route::get("users/export", [UserController::class, "export_csv"])->name("users.export");
    Route::resource("users", UserController::class)->names("users");
});