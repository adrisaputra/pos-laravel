<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

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

Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    dd("Cache Clear All");
});

Route::get('/buat_storage', function () {
    Artisan::call('storage:link');
    dd("Storage Berhasil Di Buat");
});

Route::get('wbs-login', function () {
    return view('auth.login');
});

Route::post('/login-sistem', [LoginController::class, 'authenticate']);
Route::get('registrasi', [RegistrasiController::class, 'registrasi']);
Route::post('registrasi', [RegistrasiController::class, 'store']);
Route::post('/logout-sistem', [LoginController::class, 'logout']);

// Route::group(['middleware' => 'is.group'], function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/dashboard', [HomeController::class, 'index']);

    ## Supplier
    Route::get('/supplier', [SupplierController::class, 'index']);
    Route::get('/supplier/search', [SupplierController::class, 'search']);
    Route::get('/supplier/create', [SupplierController::class, 'create']);
    Route::post('/supplier', [SupplierController::class, 'store']);
    Route::get('/supplier/edit/{supplier}', [SupplierController::class, 'edit']);
    Route::put('/supplier/edit/{supplier}', [SupplierController::class, 'update']);
    Route::get('/supplier/hapus/{supplier}',[SupplierController::class, 'delete']);

    ## Profil
    Route::get('/profil', [ProfilController::class, 'index']);
    Route::get('/profil/search', [ProfilController::class, 'search']);
    Route::get('/profil/create', [ProfilController::class, 'create']);
    Route::post('/profil', [ProfilController::class, 'store']);
    Route::get('/profil/edit/{profil}', [ProfilController::class, 'edit']);
    Route::put('/profil/edit/{profil}', [ProfilController::class, 'update']);
    Route::get('/profil/hapus/{profil}',[ProfilController::class, 'delete']);

    ## Pengaturan
    Route::get('/pengaturan', [PengaturanController::class, 'index']);
    Route::put('/pengaturan/edit/{pengaturan}', [PengaturanController::class, 'update']);

    ## User
    Route::get('/user', [UserController::class, 'index']);
    Route::get('/user/search', [UserController::class, 'search']);
    Route::get('/user/create', [UserController::class, 'create']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/edit/{user}', [UserController::class, 'edit']);
    Route::put('/user/edit/{user}', [UserController::class, 'update']);
    Route::get('/user/edit_profil', [UserController::class, 'edit_profil']);
    Route::put('/user/update_profil/{user}', [UserController::class, 'update_profil']);
    Route::get('/user/hapus/{user}',[UserController::class, 'delete']);

// });