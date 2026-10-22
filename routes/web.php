<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotorController;

Route::get('/', [MotorController::class, 'index']);
Route::post('/motor', [MotorController::class, 'store'])->name('motor.store');
Route::delete('/motor/{id}', [MotorController::class, 'destroy'])->name('motor.destroy');