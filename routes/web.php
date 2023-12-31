<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::inertia('/', 'Home')->name('home');

Route::group(['middleware' => 'guest'], function() {
    Route::inertia('/login', 'Auth/Login')->name('login.page');

    Route::post('/login', [LoginController::class, 'login'])->name('login');

    Route::inertia('/register', 'Auth/Register')->name('register.page');

    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::group(['middleware' => 'auth'], function() {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['as' => 'users.', 'prefix' => '/users'], function() {
        Route::get('/{id}/tasks', [TaskController::class, 'userTasks'])->name('tasks.index');
    });

    Route::group(['as' => 'tasks.', 'prefix' => '/tasks'], function() {
        Route::post('/tasks', [TaskController::class, 'store'])->name('store');

        Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('update');
        
        Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('destroy');
    });
});



