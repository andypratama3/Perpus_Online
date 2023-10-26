<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\BukuController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CategoryBukuController;
use App\Http\Controllers\Dashboard\Pengaturan\RoleController;
use App\Http\Controllers\Dashboard\Pengaturan\TaskController;
use App\Http\Controllers\Dashboard\Pengaturan\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', DashboardController::class)->name('dashboard.index');

    Route::group(['prefix' => 'master'], function (){
        Route::resource('buku', BukuController::class, ['names' => 'dashboard.buku']);
        Route::get('bukus/records', [BukuController::class, 'data_table'])->name('dashboard.buku.getbuku');

        Route::resource('category', CategoryBukuController::class, ['names' => 'dashboard.category.buku'])->except('show');
    });
    Route::group(['prefix' => 'pengaturan'], function (){
        Route::resource('user', UserController::class, ['names' => 'dashboard.pengaturan.user'])->except('create','store');
        Route::get('users/records', [UserController::class, 'data_table'])->name('dashboard.pengaturan.getuser');
        Route::resource('role', RoleController::class, ['names' => 'dashboard.pengaturan.role'])->except('show');
        Route::resource('task', TaskController::class, ['names' => 'dashboard.pengaturan.task'])->except('task');
    });
});


