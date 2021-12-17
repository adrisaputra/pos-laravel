<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\SkmController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PengajuController;
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

    ## Pengaduan
    Route::get('/pengaduan_masuk', [PengaduanController::class, 'index']);
    Route::get('/pengaduan_di_proses', [PengaduanController::class, 'index']);
    Route::get('/pengaduan_selesai_di_proses', [PengaduanController::class, 'index']);
    Route::get('/pengaduan_tidak_di_proses', [PengaduanController::class, 'index']);

    Route::get('/pengaduan_masuk/search', [PengaduanController::class, 'search']);
    Route::get('/pengaduan_di_proses/search', [PengaduanController::class, 'search']);
    Route::get('/pengaduan_selesai_di_proses/search', [PengaduanController::class, 'search']);
    Route::get('/pengaduan_tidak_di_proses/search', [PengaduanController::class, 'search']);

    Route::get('/pengaduan_masuk/proses/{status}/{pengaduan}', [PengaduanController::class, 'proses']);
    Route::get('/pengaduan_di_proses/proses/{status}/{pengaduan}', [PengaduanController::class, 'proses']);
    Route::get('/pengaduan_selesai_di_proses/proses/{status}/{pengaduan}', [PengaduanController::class, 'proses']);
    Route::get('/pengaduan_tidak_di_proses/proses/{status}/{pengaduan}', [PengaduanController::class, 'proses']);

    ## Layanan
    Route::get('/layanan', [LayananController::class, 'index']);
    Route::get('/layanan/search', [LayananController::class, 'search']);
    Route::get('/layanan/create', [LayananController::class, 'create']);
    Route::post('/layanan', [LayananController::class, 'store']);
    Route::get('/layanan/edit/{layanan}', [LayananController::class, 'edit']);
    Route::put('/layanan/edit/{layanan}', [LayananController::class, 'update']);
    Route::get('/layanan/hapus/{layanan}',[LayananController::class, 'delete']);

    ## Pengajuan
    
    Route::get('/pengajuan/create/{layanan}', [PengajuanController::class, 'create']);
    Route::post('/pengajuan', [PengajuanController::class, 'store']);
    Route::get('/pengajuan_di_perbaiki/perbaiki/{pengajuan}', [PengajuanController::class, 'perbaiki']);
    Route::put('/pengajuan_di_perbaiki/perbaiki/{pengajuan}', [PengajuanController::class, 'edit_pengaju']);
    Route::get('/pengajuan_selesai_di_proses/download/{pengajuan}', [PengajuanController::class, 'download']);

    Route::get('/pengajuan_masuk', [PengajuanController::class, 'index']);
    Route::get('/pengajuan_di_proses', [PengajuanController::class, 'index']);
    Route::get('/pengajuan_di_perbaiki', [PengajuanController::class, 'index']);
    Route::get('/pengajuan_selesai_di_proses', [PengajuanController::class, 'index']);
    Route::get('/pengajuan_tidak_di_proses', [PengajuanController::class, 'index']);

    Route::get('/pengajuan_masuk/search', [PengajuanController::class, 'search']);
    Route::get('/pengajuan_di_proses/search', [PengajuanController::class, 'search']);
    Route::get('/pengajuan_selesai_di_proses/search', [PengajuanController::class, 'search']);
    Route::get('/pengajuan_tidak_di_proses/search', [PengajuanController::class, 'search']);

    Route::put('/pengajuan_masuk/edit/{pengajuan}', [PengajuanController::class, 'edit_eksekutor']);
    Route::put('/pengajuan_di_proses/edit/{pengajuan}', [PengajuanController::class, 'edit_eksekutor']);
    Route::put('/pengajuan_di_perbaiki/edit/{pengajuan}', [PengajuanController::class, 'edit_eksekutor']);
    Route::put('/pengajuan_selesai_di_proses/edit/{pengajuan}', [PengajuanController::class, 'edit_eksekutor']);
    Route::put('/pengajuan_tidak_di_proses/edit/{pengajuan}', [PengajuanController::class, 'edit_eksekutor']);
    
    Route::get('/pengajuan_masuk/proses/{status}/{pengajuan}', [PengajuanController::class, 'proses']);
    Route::get('/pengajuan_di_proses/proses/{status}/{pengajuan}', [PengajuanController::class, 'proses']);
    Route::get('/pengajuan_di_perbaiki/proses/{status}/{pengajuan}', [PengajuanController::class, 'proses']);
    Route::get('/pengajuan_selesai_di_proses/proses/{status}/{pengajuan}', [PengajuanController::class, 'proses']);
    Route::get('/pengajuan_tidak_di_proses/proses/{status}/{pengajuan}', [PengajuanController::class, 'proses']);

    ## SKM
    Route::get('/skm/{skm}/{pengajuan}', [SkmController::class, 'store']);


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

    ## Pengaju
    Route::get('/pengaju', [PengajuController::class, 'index']);
    Route::get('/pengaju/search', [PengajuController::class, 'search']);
    Route::get('/pengaju/create', [PengajuController::class, 'create']);
    Route::post('/pengaju', [PengajuController::class, 'store']);
    Route::get('/pengaju/edit/{pengaju}', [PengajuController::class, 'edit']);
    Route::put('/pengaju/edit/{pengaju}', [PengajuController::class, 'update']);
    Route::get('/pengaju/hapus/{pengaju}',[PengajuController::class, 'delete']);

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