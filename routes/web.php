<?php

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Lunaweb\Localization\Facades\Localization;

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

Localization::localizedRoutesGroup(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu');
});

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
