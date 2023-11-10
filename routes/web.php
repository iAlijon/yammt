<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Route;

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

Route::get('login', [\App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware(['auth:web'])->group(function (){
    Route::group(['prefix' => 'admin'], function (){
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resources([
            'menu' => MenuController::class,
            'news' => NewsController::class,
            'menu-item' => MenuItemController::class
        ]);
    });
});
