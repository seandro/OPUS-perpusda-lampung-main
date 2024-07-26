<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::post('/', [MainController::class, 'handle',])->name('index');
Route::get('/detail-buku/{id}', [MainController::class, 'showBuku'])->name('detail-buku');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/profile',  [MainController::class, 'storeEditProfile'])->name('profile');
Route::get( '/profile',  [MainController::class, 'showEditProfile'])->name('profile');
Route::post( '/change-password',  [MainController::class, 'storeChangePassword'])->name('ganti-password');

Route::get('/data-buku', [EmployeeController::class, 'show'])->name('data-buku');
Route::get('/data-buku/tambah', [EmployeeController::class, 'showTambahBuku'])->name('tambah-buku');
Route::post('/data-buku/tambah', [EmployeeController::class, 'tambahBuku'])->name('tambah-buku');
Route::get('/data-buku/hapus/{id}', [EmployeeController::class, 'hapusBuku'])->name('hapus-buku');
Route::get('/data-buku/edit/{id}', [EmployeeController::class, 'showEditBuku'])->name('edit-buku');
Route::post('/data-buku/edit/{id}', [EmployeeController::class, 'storeEditBuku'])->name('edit-buku');

Route::get('/data-karyawan', [AdminController::class, 'show'])->name('data-karyawan');
Route::get('/data-karyawan/tambah', [AdminController::class, 'showTambahKaryawan'])->name('tambah-karyawan');
Route::post('/data-karyawan/tambah', [AdminController::class, 'storeTambahKaryawan'])->name('tambah-karyawan');
Route::get('/data-karyawan/hapus-karyawan/{id}', [AdminController::class, 'hapusKaryawan'])->name('hapus-karyawan');
Route::get('/data-karyawan/reset-karyawan/{id}', [AdminController::class, 'resetKaryawan'])->name('reset-karyawan');

Route::get('/contact', function(){
    return view('contact', ['nav' => 3]);
});