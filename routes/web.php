<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CarController::class, 'index'])->name('index');
Route::get('/RegisterCar', [CarController::class, 'add'])->name('car.register');
Route::post('/register/store', [CarController::class, 'store'])->name('car.store');
Route::get('/car/{car}/edit', [CarController::class, 'edit'])->name('car.edit');
Route::put('/car/{car}/update', [CarController::class, 'update'])->name('car.update');
Route::delete('/car/{car}/destroy', [CarController::class, 'destroy'])->name('car.destroy')->withTrashed();
Route::get('/car/archive', [CarController::class, 'archive'])->name('car.archive')->withTrashed();
Route::post('/car/{car}/restore', [CarController::class, 'restore'])->name('car.restore')->withTrashed();
