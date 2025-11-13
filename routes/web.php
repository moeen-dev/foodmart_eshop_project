<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function () {
    Route::get('/', function() {
        return redirect()->route('admin.login');
    });
    // Admin login route
    Route::get('/admin-login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('/admin-login', [AuthController::class, 'authenticate'])->name('admin.authenticate');
    Route::post('/admin-logout', [AuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('admin.auth')->group(function () {
        Route::get('/admin-dashboard', [BackendHomeController::class, 'index'])->name('admin.dashboard');
    });
});
