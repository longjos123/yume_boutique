<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'viewLogin'])->name('viewLogin');
Route::post('/', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'viewRegister'])->name('viewRegister');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('index', [DashboardController::class, 'index'])->name('index');

