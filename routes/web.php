<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShipmentController::class, 'index']);
Route::get('/track', [ShipmentController::class, 'track']);
