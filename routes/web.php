<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocioeducatingController;
use App\Http\Middleware\RoleMiddleware;


 
// Rotas para visitantes
Route::middleware("guest")->group(function(){
    Route::view("login", "guest.login")->name("login");
    Route::view("register", "guest.register")->name("register");

    Route::post("register", [UserController::class, "register"])->name("user.register");
    Route::post("authenticate", [AuthController::class, "authenticate"])->name("authenticate");

    Route::view("forgot_password", "guest.forgot-password")->name("forgot_password");
    Route::post("password-request", [PasswordResetController::class, 'password_request'])->name('password.request');
    Route::get('password-reset/{token}', [PasswordResetController::class, 'password_reset'])->name('password.reset');
    Route::put("password-update", [PasswordResetController::class, 'password_update'])->name('password.update');

    Route::get('/register', function() {
        return Inertia::render('Guest/Register');
    })->name('register');
});

// Rotas para usuários autenticados
Route::middleware("auth")->group(function(){

    
   // Route::get("/", HomeController::class)->name("dashboard");

    Route::get('/socioeducandos', [SocioeducatingController::class, 'index'])->name('socioeducating.index');
    Route::get('/socioeducandos/edit', [SocioeducatingController::class, 'edit'])->name('socioeducating.edit');

    Route::get('/socioeducandos/register-step-1', [SocioeducatingController::class, 'register_step_1'])->name('socioeducating.register_step_1');
    Route::post('/socioeducandos/register-step-1', [SocioeducatingController::class, 'register_step_1_store'])->name('socioeducating.register_step_1_store');


    Route::get('socioeducating/{id}/register-step-2', [SocioeducatingController::class, 'register_step_2'])->name('socioeducating.register_step_2');
    Route::post('socioeducating/{id}/register-step-2', [SocioeducatingController::class, 'register_step_2_store'])->name('socioeducating.register_step_2_store');

    Route::get('socioeducating/{id}/documents/edit', [SocioeducatingController::class, 'editDocuments'])->name('socioeducating.documents.edit');
    Route::put('socioeducating/{id}/documents', [SocioeducatingController::class, 'updateDocuments'])->name('socioeducating.documents.update');

    Route::get('/socioeducandos/profile/{id}', [SocioeducatingController::class, 'profile'])->name('socioeducating.profile');
    
    
    Route::get("/", HomeController::class)->name("dashboard");
    Route::post("logout", [AuthController::class, "logout"])->name("logout");

    Route::get("users/export", [UserController::class, "export_csv"])->name("users.export");
    Route::resource("users", UserController::class)->names("users");
});
/*
// Rotas para usuários admin
Route::middleware(['auth', RoleMiddleware::class.':admin'])->group(function () {
  
    
    
    Route::resource('socioeducating', SocioeducatingController::class);

    // Documentos
    Route::get('socioeducating/{id}/documents', [SocioeducatingController::class, 'documents'])->name('socioeducating.documents');
    Route::post('socioeducating/{id}/documents', [SocioeducatingController::class, 'storeDocuments'])->name('socioeducating.storeDocuments');

    Route::get('socioeducating/{id}/documents/edit', [SocioeducatingController::class, 'editDocuments'])->name('socioeducating.documents.edit');
    Route::put('socioeducating/{id}/documents', [SocioeducatingController::class, 'updateDocuments'])->name('socioeducating.documents.update');
});
 */