<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShipmentController::class, 'index']);
Route::post('/shipment', [ShipmentController::class, 'store']);
Route::get('/api/shipments', [ShipmentController::class, 'apiIndex']);
Route::get('/shipment/create', [ShipmentController::class, 'create']);
Route::get('/shipment/{id}', [ShipmentController::class, 'show']);
Route::get('/shipment/{id}/edit', [ShipmentController::class, 'edit']);
Route::post('/shipment/{id}/update', [ShipmentController::class, 'update']);

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    return 'Welcome Admin!';
})->middleware(['auth', 'role:super admin']);
