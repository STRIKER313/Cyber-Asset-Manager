<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/login-admin', function () {
    return view('login-admin');
})->name('login-admin');

Route::post('/login_admin_process', [AuthController::class, 'loginAdminProcess'])
    ->name('login_admin_process');

Route::get('/login-user', function () {
    return view('login-user');
})->name('login-user');

Route::post('/login_user_process', [AuthController::class, 'loginUserProcess'])
    ->name('login_user_process');

Route::get('/register-user', function () {
    return view('register-user');
})->name('register-user');

Route::post('/register_user_process', [AuthController::class, 'registerUserProcess'])
    ->name('register_user_process');

Route::get('/login-operator', [AuthController::class, 'showLoginOperatorForm'])
    ->name('login-operator');

Route::post('/login_operator_process', [AuthController::class, 'loginOperatorProcess'])
    ->name('login_operator_process');

Route::get('/register-operator', [AuthController::class, 'showRegisterOperatorForm'])
    ->name('register-operator');

Route::post('/register_operator_process', [AuthController::class, 'registerOperatorProcess'])
    ->name('register_operator_process');


Route::middleware(['admin.auth'])->group(function () {
    Route::get('/dashboard-admin', [AuthController::class, 'dashboardAdmin'])
        ->name('dashboard_admin');
    Route::get('/admin-about', [DashboardController::class, 'adminAbout'])
        ->name('admin_about');
});

Route::middleware(['user.auth'])->group(function () {
    Route::get('/dashboard-user', [AuthController::class, 'dashboardUser'])
        ->name('dashboard_user');
});

Route::middleware(['operator.auth'])->group(function () {
    Route::get('/dashboard-operator', [DashboardController::class, 'dashboardOperator'])
        ->name('dashboard_operator');
        
    Route::resource('assets', AssetController::class);
});