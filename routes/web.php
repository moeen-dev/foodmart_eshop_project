<?php

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
    // Route::get('/', function() {
    //     return redirect()->route();
    // })

    Route::get('/admin-dashboard', [\App\Http\Controllers\Backend\HomeController::class, 'index'])->name('admin.dashboard');
});
