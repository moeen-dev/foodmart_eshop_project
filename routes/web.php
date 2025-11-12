<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {
    Route::get('/', function() {
        return redirect()->route('admin.login');
    });
    // Admin login route
    Route::get('/admin-login', [AuthController::class, 'login'])->name('admin.login');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/admin-dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    });
});
