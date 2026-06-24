<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/', [UserController::class, 'welcome']);

Route::get('register', [UserController::class, 'register'])->name('register');

Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('login', [UserController::class, 'login'])->name('login');

Route::post('postlogin', [UserController::class, 'postlogin'])->name('postlogin');

Route::post('register', [UserController::class, 'postRegister'])->name('register-user');

Route::get('signout',[UserController::class, 'signOut'])->name('signout');