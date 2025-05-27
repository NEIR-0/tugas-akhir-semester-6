<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShipmentController::class, 'index']);
Route::get('/api/shipments', [ShipmentController::class, 'apiIndex']);
Route::post('/shipment', [ShipmentController::class, 'store']);
Route::get('/shipment/create', [ShipmentController::class, 'create']);
Route::get('/shipment/{id}', [ShipmentController::class, 'show']);
Route::get('/shipment/{id}/edit', [ShipmentController::class, 'edit']);
Route::post('/shipment/{id}/update', [ShipmentController::class, 'update']);

