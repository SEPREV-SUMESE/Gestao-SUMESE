<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    HomeController,
    PasswordResetController,
    UserController,
    SocioEducatingController,
};

// Rotas para visitantes
Route::middleware("guest")->group(function () {
    Route::inertia("login", "Guest/Login")->name("login");
    Route::inertia("register", "Guest/Register")->name("register");

    Route::post("register", [UserController::class, "register"])->name("user.register");
    Route::post("authenticate", [AuthController::class, "authenticate"])->name("authenticate");

    Route::inertia("forgot_password", "Guest/ForgotPassword")->name("forgot_password");
    Route::post("password-request", [PasswordResetController::class, 'password_request'])->name('password.request');
    Route::get('password-reset/{token}', [PasswordResetController::class, 'password_reset'])->name('password.reset');
    Route::put("password-update", [PasswordResetController::class, 'password_update'])->name('password.update');

    Route::inertia('/register', 'Guest/Register')->name('register');
});

// Rotas para usuários autenticados
Route::middleware("auth")->group(function () {
    Route::get("/", HomeController::class)->name("dashboard");
    Route::post("logout", [AuthController::class, "logout"])->name("logout");

    Route::get("users/export", [UserController::class, "export_csv"])->name("users.export");
    Route::resource("users", UserController::class)->names("users");

    Route::get('/socioeducandos', [SocioEducatingController::class, 'index'])->name('socioeducating.index');
    Route::get('/socioeducandos/edit', [SocioEducatingController::class, 'edit'])->name('socioeducating.edit');

    Route::get('/socioeducandos/register-step-1', [SocioEducatingController::class, 'register_step_1'])->name('socioeducating.register_step_1');
    Route::post('/socioeducandos/register-step-1', [SocioEducatingController::class, 'register_step_1_store'])->name('socioeducating.register_step_1_store');


    Route::get('socioeducating/{id}/register-step-2', [SocioEducatingController::class, 'register_step_2'])->name('socioeducating.register_step_2');
    Route::post('socioeducating/{id}/register-step-2', [SocioEducatingController::class, 'register_step_2_store'])->name('socioeducating.register_step_2_store');

    Route::get('socioeducating/{id}/documents/edit', [SocioEducatingController::class, 'editDocuments'])->name('socioeducating.documents.edit');
    Route::put('socioeducating/{id}/documents', [SocioEducatingController::class, 'updateDocuments'])->name('socioeducating.documents.update');

    Route::get('/socioeducandos/profile/{id}', [SocioEducatingController::class, 'profile'])->name('socioeducating.profile');
});
/*
// Rotas para usuários admin
Route::middleware(['auth', RoleMiddleware::class.':admin'])->group(function () {



    Route::resource('socioeducating', SocioEducatingController::class);

    // Documentos
    Route::get('socioeducating/{id}/documents', [SocioEducatingController::class, 'documents'])->name('socioeducating.documents');
    Route::post('socioeducating/{id}/documents', [SocioEducatingController::class, 'storeDocuments'])->name('socioeducating.storeDocuments');

    Route::get('socioeducating/{id}/documents/edit', [SocioEducatingController::class, 'editDocuments'])->name('socioeducating.documents.edit');
    Route::put('socioeducating/{id}/documents', [SocioEducatingController::class, 'updateDocuments'])->name('socioeducating.documents.update');
});
 */
