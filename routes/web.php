<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\KasirController;
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

    ## Kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::get('/kategori/search', [KategoriController::class, 'search']);
    Route::get('/kategori/create', [KategoriController::class, 'create']);
    Route::post('/kategori', [KategoriController::class, 'store']);
    Route::get('/kategori/edit/{kategori}', [KategoriController::class, 'edit']);
    Route::put('/kategori/edit/{kategori}', [KategoriController::class, 'update']);
    Route::get('/kategori/hapus/{kategori}',[KategoriController::class, 'delete']);

    ## Satuan
    Route::get('/satuan', [SatuanController::class, 'index']);
    Route::get('/satuan/search', [SatuanController::class, 'search']);
    Route::get('/satuan/create', [SatuanController::class, 'create']);
    Route::post('/satuan', [SatuanController::class, 'store']);
    Route::get('/satuan/edit/{satuan}', [SatuanController::class, 'edit']);
    Route::put('/satuan/edit/{satuan}', [SatuanController::class, 'update']);
    Route::get('/satuan/hapus/{satuan}',[SatuanController::class, 'delete']);
    Route::get('/satuan/get', [SatuanController::class, 'get']);

    ## Barang
    Route::get('/barang', [BarangController::class, 'index']);
    Route::get('/barang/search', [BarangController::class, 'search']);
    Route::post('/barang/get', [BarangController::class, 'get']);
    Route::get('/barang/create', [BarangController::class, 'create']);
    Route::post('/barang', [BarangController::class, 'store']);
    Route::get('/barang/edit/{barang}', [BarangController::class, 'edit']);
    Route::put('/barang/edit/{barang}', [BarangController::class, 'update']);
    Route::get('/barang/hapus/{barang}',[BarangController::class, 'delete']);
    Route::post('/barang/import_excel', [BarangController::class, 'import_excel']);

    ## Gudang
    Route::get('/gudang', [GudangController::class, 'index']);
    Route::get('/gudang/search', [GudangController::class, 'search']);

    ## Pembelian
    Route::get('/pembelian', [PembelianController::class, 'index']);
    Route::get('/pembelian/search', [PembelianController::class, 'search']);
    Route::get('/pembelian/create', [PembelianController::class, 'create']);
    Route::post('/pembelian', [PembelianController::class, 'store']);
    Route::get('/pembelian/edit/{pembelian}', [PembelianController::class, 'edit']);
    Route::put('/pembelian/edit/{pembelian}', [PembelianController::class, 'update']);
    Route::get('/pembelian/hapus/{pembelian}',[PembelianController::class, 'delete']);
    Route::post('/pembelian/import_excel', [PembelianController::class, 'import_excel']);

    ## Retur
    Route::get('/retur', [ReturController::class, 'index']);
    Route::get('/retur/search', [ReturController::class, 'search']);
    Route::get('/retur/create', [ReturController::class, 'create']);
    Route::post('/retur', [ReturController::class, 'store']);
    Route::get('/retur/edit/{retur}', [ReturController::class, 'edit']);
    Route::put('/retur/edit/{retur}', [ReturController::class, 'update']);
    Route::get('/retur/hapus/{retur}',[ReturController::class, 'delete']);
    Route::post('/retur/import_excel', [ReturController::class, 'import_excel']);

    ## Kasir
    Route::get('/kasir', [KasirController::class, 'index']);
    Route::get('/kasir/refresh', [KasirController::class, 'refresh']);
    Route::get('/kasir/search', [KasirController::class, 'search']);
    Route::get('/kasir/create', [KasirController::class, 'create']);
    Route::put('/kasir/edit/{kasir}', [KasirController::class, 'update']);
    Route::get('/kasir/edit2/{id}/{jumlah}',[KasirController::class, 'update2']);
    Route::post('/kasir', [KasirController::class, 'store']);
    Route::get('/kasir/hapus/{kasir}',[KasirController::class, 'delete']);
    Route::get('/kasir/nomor_invoice', [KasirController::class, 'nomor_invoice']);

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