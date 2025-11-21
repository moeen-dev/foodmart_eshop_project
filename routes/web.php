<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\CategoryController as BackendCategoryController;
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
Route::get('/category', [CategoryController::class, 'index'])->name('frontend.category');


Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
});


// Admin routes
Route::prefix('admin')->middleware(['auth', 'admin.auth'])->group(function () {
    Route::get('/dashboard', [BackendHomeController::class, 'index'])->name('admin.dashboard');
    Route::resource('/product-category', BackendCategoryController::class);
});

require __DIR__ . '/auth.php';
