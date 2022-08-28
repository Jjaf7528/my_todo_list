<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('auth')->group(function(){
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerVerify'])->name('register.verify');
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('verify', [AuthController::class, 'loginVerify'])->name('login.verify');
    Route::post('signOut', [AuthController::class, 'signOut'])->name('signOut');
});

Route::resource('tasks',TaskController::class)->middleware('auth');
