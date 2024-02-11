<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\SimpananController;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use Illuminate\Support\Facades\Auth;
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

//Login
Route::get('/', [AuthController::class,'login'])->name('login');
//Action Login
Route::post('/login-admin', [AuthController::class, 'store']);


Route::middleware(['auth'])->group(function () {

//Tampilkan Halaman Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

//Bagian Anggota
//Tampilkan Halaman Anggota
Route::get('/dashboard/anggota', [AnggotaController::class, 'index']);
//Action Untuk Tambah Anggota
Route::post('/dashboard/add/anggota', [AnggotaController::class, 'add']);
//Action Update Anggota
Route::post('/update/anggota/{id}', [AnggotaController::class, 'update']);
//Action Untuk Hapus Anggota
Route::get('/dashboard/delete/anggota/{id}', [AnggotaController::class, 'delete']);
//Action Untuk Tambah Anak
Route::post('/dashboard/add/anak/{id}', [AnggotaController::class, 'anak']);
//Action Untuk Update Anak
Route::post('/update/anak/{id}', [AnggotaController::class, 'anakUpdate']);
//Action Untuk Hapus Anak
Route::get('/delete/anak/{id}', [AnggotaController::class, 'anakDelete']);
//Action Untuk Tambah Pasangan
Route::post('/dashboard/add/pasangan/{id}', [AnggotaController::class, 'pasangan']);
//Action Untuk Update Pasangan
Route::post('/update/pasangan/{id}', [AnggotaController::class, 'pasanganUpdate']);
//Action Untuk Hapus Pasangan
Route::get('/delete/pasangan/{id}', [AnggotaController::class, 'pasanganDelete']);
//Tampilkan Halaman Detail Anggota
Route::get('/dashboard/update/anggota/{id}', [AnggotaController::class, 'detail'])->name('update');
//Export Anggota
Route::get('/export/anggota', [AnggotaController::class, 'exportPdf']);
//End Bagian Anggota

//Halaman Report ketua Angsuran
Route::get('/dashboard/report-anggota', function () {
    return view('pages.anggota.report-anggota', ['title' => 'Laporan anggota', 'link' => 'report-anggota']);
});

//Bagian Simpanan
//Tampilkan Halaman Simpanan
Route::get('/dashboard/simpanan', [SimpananController::class, 'index']);
//Tambahkan Data Simpanan
Route::post('/dashboard/simpanan/add',[SimpananController::class, 'add']);
//Halaman Update Simpanan
Route::get('/dashboard/update/simpanan/{id}', [SimpananController::class, 'updatePages']);
//Action Update Simpanan
Route::post('/update/simpanan/{id}', [SimpananController::class, 'update']);
//Action Hapus Simpanan
Route::get('/dashboard/delete/simpanan/{id}', [SimpananController::class, 'delete']);
//Export
Route::get('/export/simpanan', [SimpananController::class, 'exportPdf']);
//End Bagian Simpanan

//Halaman Report ketua Angsuran
Route::get('/dashboard/report-simpanan', function () {
    return view('pages.simpanan.report-simpanan', ['title' => 'Laporan simpanan', 'link' => 'report-simpanan']);
});



//Bagian Pinjaman
//Tampilkan Halaman Pinjaman
Route::get('/dashboard/pinjaman', [PinjamanController::class, 'index']);
//Action Add Pinjaman
Route::post('/dashboard/pinjaman/add', [PinjamanController::class, 'add']);
//Halaman Detail Pinjaman
Route::get('/dashboard/update/pinjaman/{id}', [PinjamanController::class, 'updatePages']);
//Action Update Pinjaman
Route::post('/update/pinjaman/{id}', [PinjamanController::class, 'update']);
//Action Hapus Pinjaman
Route::get('/dashboard/delete/pinjaman/{id}', [PinjamanController::class, 'delete']);
//Export Pinjaman
Route::get('/export/pinjaman', [PinjamanController::class, 'exportPdf']);

//Halaman Report ketua Angsuran
Route::get('/dashboard/report-pinjaman', function () {
    return view('pages.pinjaman.report-pinjaman', ['title' => 'Laporan pinjaman', 'link' => 'report-pinjaman']);
});


//Bagian Angsuran
//Tampilkan HalamanAngsuran
Route::get('/dashboard/angsuran', [AngsuranController::class, 'index']);
//Action Tambah Angsuran
Route::post('/dashboard/angsuran/add', [AngsuranController::class, 'add']);
//Halaman Detail Angsuran
Route::get('/dashboard/update/angsuran/{id}', [AngsuranController::class, 'updatePages']);
//Action Update Angsuran
Route::post('/update/angsuran/{id}', [AngsuranController::class, 'update']);
//Action Hapus Angsuran
Route::get('/dashboard/delete/angsuran/{id}',[AngsuranController::class, 'delete']);
//Halaman Bayar Angsuran
Route::get('/dashboard/angsuran/bayar', [AngsuranController::class, 'bayar']);
//Action Bayar Angsuran
Route::post('/bayar/angsuran/', [AngsuranController::class, 'pay']);
//EXPORT Angsuran
Route::get('/export/angsuran', [AngsuranController::class, 'exportPdf']);

//Halaman Report ketua Angsuran
Route::get('/dashboard/report-angsuran', function () {
    return view('pages.angsuran.report-angsuran', ['title' => 'Laporan Angsuran', 'link' => 'report-angsuran']);
});

//Manage Admin
Route::get('/dashboard/user', [AuthController::class, 'index']);
//Action Tambah Admin
Route::post('/users/admin/add', [AuthController::class, 'add']);
//Update Admin
Route::post('/dashboard/admin/update/{id}', [AuthController::class, 'update']);
//Hapus Admin
Route::get('/delete/admin/{id}', [AuthController::class, 'delete']);
//Logout
Route::get('/logout', [AuthController::class, 'logout']);

});
