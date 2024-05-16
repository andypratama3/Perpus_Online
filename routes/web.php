<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CategoryBukuController;
use App\Http\Controllers\Dashboard\Pengaturan\RoleController;
use App\Http\Controllers\Dashboard\Pengaturan\TaskController;
use App\Http\Controllers\Dashboard\Pengaturan\UserController;
use App\Http\Controllers\Dashboard\JurnalController as DashboardJurnalController;
use App\Http\Controllers\Dashboard\BukuController as DashboardBukuController;
use App\Http\Controllers\Dashboard\KaryaController as DashboardKaryaController;
use App\Http\Controllers\Dashboard\BeritaController as DashboardBeritaController;




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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['prefix' => '/',], function () {

    Route::get('/', WelcomeController::class)->name('index');
    Route::resource('buku', BukuController::class,  ['names' => 'buku']);
    Route::resource('jurnals', JurnalController::class,  ['names' => 'jurnal']);
    Route::get('kontak',  [ContactController::class, 'index'])->name('contact.index');
    Route::get('karya', [KaryaController::class,'index'])->name('karya.index');
    Route::get('berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {
        Route::get('buku/baca/{slug}', [BukuController::class, 'baca_buku'])->name('buku.baca');
    });

});
Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'verified']], function () {

    Route::get('/', DashboardController::class)->name('dashboard.index');

    Route::group(['prefix' => 'master'], function (){
        //buku
        Route::resource('buku', DashboardBukuController::class, ['names' => 'dashboard.buku']);
        Route::get('buku/baca/{slug}', [DashboardBukuController::class,'detail_buku'])->name('dashboard.buku.detail_buku');
        Route::get('bukus/records', [DashboardBukuController::class, 'data_table'])->name('dashboard.buku.getbuku');
        Route::resource('category', CategoryBukuController::class, ['names' => 'dashboard.category.buku'])->except('show');
        //jurnal
        Route::resource('jurnal', DashboardJurnalController::class, ['names' => 'dashboard.jurnal']);
        Route::get('jurnals/records', [DashboardJurnalController::class, 'data_table'])->name('dashboard.jurnal.getjurnal');
        Route::get('jurnal/baca/{slug}', [DashboardJurnalController::class,'detail_buku'])->name('dashboard.jurnal.detail_jurnal');
        Route::resource('berita', DashboardBeritaController::class, ['names' => 'dashboard.master.berita']);
        Route::get('beritas/records', [DashboardBeritaController::class, 'data_table'])->name('dashboard.master.berita.getBerita');
        Route::resource('karya', DashboardKaryaController::class, ['names' => 'dashboard.master.karya']);
        Route::get('karyas/records', [DashboardKaryaController::class, 'data_table'])->name('dashboard.master.karya.getKarya');

    });
    Route::group(['prefix' => 'pengaturan'], function (){
        Route::resource('user', UserController::class, ['names' => 'dashboard.pengaturan.user'])->except('create','store');
        Route::get('users/records', [UserController::class, 'data_table'])->name('dashboard.pengaturan.getuser');
        Route::resource('role', RoleController::class, ['names' => 'dashboard.pengaturan.role'])->except('show');
        Route::resource('task', TaskController::class, ['names' => 'dashboard.pengaturan.task'])->except('task');
    });
});


