<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\CategoriInformasiController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\KomisariatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Komisariat;

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
Route::get('/', [BerandaController::class, 'index'])->name('home2');
Route::get('/galeri-2', [BerandaController::class, 'galery'])->name('home2');
Route::get('/informasi-2', [BerandaController::class, 'informasi'])->name('home2');
Route::get('/informasi-2/{id}', [BerandaController::class, 'informasiTampil'])->name('informasi.tampil');
Route::get('/kader-2/{id}', [BerandaController::class, 'kader'])->name('home2');
Route::get('/kader-2/{id}/cari', [BerandaController::class, 'cariKaderJson'])->name('cariKaderJson');
// Route::get('/', function()
// {
//     return view('template2.master2');
// });
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('/home', [KomisariatController::class, 'sidebar'])->name('sidebar')->middleware('auth');
// Route::get('/login', function () {
//     return view('login'); 
// });
Route::get('/login222', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

// Kader//

Route:: get('/kaderKmst', [KaderController::class, 'index']);
Route:: get('/kader/{id}', [KaderController::class, 'index']);
Route:: get('/kader/detail/{id}', [KaderController::class, 'show']);
Route:: get('/kader/tambah/{id}', [KaderController::class, 'create'])->name('kader.tambah');
Route:: post('/kader/store', [KaderController::class, 'store']);
Route:: post('/kader/update', [KaderController::class, 'update']);
Route:: get('/kader/edit/{id}/{komisariat}', [KaderController::class, 'edit']);
Route:: get('/kader/hapus/{id}', [KaderController::class, 'destroy']);
Route::get('/kader/{id}/export_excel', [KaderController::class, 'export_excel'])->middleware('auth');
Route::get('/kader/{id}/print', [KaderController::class, 'print'])->middleware('auth');
Route::post('/kader', [KaderController::class, 'filter'])->name('kader.filter')->middleware('auth');
Route::get('/kader/{id}/cari', [KaderController::class, 'cari'])->name('kader.cari')->middleware('auth');

Route:: get('/komisariat', [KomisariatController::class, 'index']);
Route:: get('/komisariat/detail/{id}', [KomisariatController::class, 'show']);
Route:: get('/komisariat/tambah', [KomisariatController::class, 'create']);
Route:: post('/komisariat/store', [KomisariatController::class, 'store']);
Route:: post('/komisariat/update', [KomisariatController::class, 'update'])->name('komisariat.update')->middleware('auth');
Route:: get('/komisariat/edit/{id}', [KomisariatController::class, 'edit']);
Route:: get('/komisariat/hapus/{id}', [KomisariatController::class, 'destroy']);
Route::get('/komisariat/export_excel', [KomisariatController::class, 'export_excel'])->middleware('auth');
Route::get('/komisariat/print', [KomisariatController::class, 'print'])->middleware('auth');
Route::post('/komisariat', [KomisariatController::class, 'filter'])->name('komisariat.filter')->middleware('auth');
Route::get('/komisariat/cari', [KomisariatController::class, 'cari'])->name('kader.cari')->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->name('user.list')->middleware('auth');
Route::get('/user/cari', [UserController::class, 'cari'])->name('user.cari')->middleware('auth');
Route::get('/user/detail/{id}', [UserController::class, 'show'])->name('user.detail')->middleware('auth');
Route::get('/user/tambah', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::post('/user/update', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::get('/user/hapus/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
Route::get('/user/profil/{id}', [UserController::class, 'profil'])->name('user.profil')->middleware('auth');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.list')->middleware('auth');
Route::get('/galeri/tambah', [GaleriController::class, 'create'])->name('galeri.tambah')->middleware('auth');
Route::post('/galeri/store', [GaleriController::class, 'store'])->name('image.store')->middleware('auth');
Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('image.edit')->middleware('auth');
Route::post('/galeri/update', [GaleriController::class, 'update'])->name('image.update')->middleware('auth');
Route::get('/galeri/hapus/{id}', [GaleriController::class, 'destroy'])->name('image.hapus')->middleware('auth');

Route::get('/informasi', [InformasiController::class, 'index'])->name('informasi.list')->middleware('auth');
Route::get('/informasi2', [InformasiController::class, 'index'])->name('informasi.list2')->middleware('auth');
Route::get('/informasi/tambah', [InformasiController::class, 'create'])->name('informasi.tambah')->middleware('auth');
Route::post('/informasi/store', [InformasiController::class, 'store'])->name('informasi.store')->middleware('auth');
Route::get('/informasi/edit/{id}', [InformasiController::class, 'edit'])->name('informasi.edit')->middleware('auth');
Route::post('/informasi/update', [InformasiController::class, 'update'])->name('informasi.update')->middleware('auth');
Route::get('/informasi/hapus/{id}', [InformasiController::class, 'destroy'])->name('informasi.hapus')->middleware('auth');

Route::get('/categoriInformasi', [CategoriInformasiController::class, 'index'])->name('categoriInformasi.list')->middleware('auth');
Route::get('/categoriInformasi/tambah', [CategoriInformasiController::class, 'create'])->name('categoriInformasi.tambah')->middleware('auth');
Route::post('/categoriInformasi/store', [CategoriInformasiController::class, 'store'])->name('categoriInformasi.store')->middleware('auth');
Route::get('/categoriInformasi/edit/{id}', [CategoriInformasiController::class, 'edit'])->name('categoriInformasi.edit')->middleware('auth');
Route::post('/categoriInformasi/update', [CategoriInformasiController::class, 'update'])->name('categoriInformasi.update')->middleware('auth');
Route::get('/categoriInformasi/hapus/{id}', [CategoriInformasiController::class, 'destroy'])->name('categoriInformasi.hapus')->middleware('auth');