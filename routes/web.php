<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TransparansiController;
use App\Models\Aspirasi;
use App\Models\Lomba;


/*
|--------------------------------------------------------------------------
| WEBSITE UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('admin.welcome');
})->name('home');

Route::get('/transparansi', [TransparansiController::class, 'index'])
    ->name('transparansi');

Route::get('/pendaftaran-lomba', function () {
    $lombas = Lomba::query()
        ->where('is_active', true)
        ->whereDate('registration_end', '>=', today())
        ->orderBy('registration_start')
        ->get();

    return view('pendaftaran-lomba', compact('lombas'));
})->name('lomba.index');


/*
|--------------------------------------------------------------------------
| PENGADUAN MAHASISWA
|--------------------------------------------------------------------------
*/

// Menampilkan form pengaduan
Route::get('/pengaduan', [PengaduanController::class, 'create'])
    ->name('pengaduan');

// Menyimpan pengaduan
Route::post('/pengaduan', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');

Route::get('/pengaduan/{pengaduan}/bukti', [PengaduanController::class, 'downloadEvidence'])
    ->middleware('signed')
    ->name('pengaduan.evidence');


/*
|--------------------------------------------------------------------------
| ASPIRASI MAHASISWA
|--------------------------------------------------------------------------
*/

// Menampilkan form aspirasi
Route::get('/aspirasi', function () {
    return view('aspirasi');
})->name('aspirasi');

// Menyimpan aspirasi
Route::post('/aspirasi', function (Request $request) {
    $validated = $request->validate([
        'nama' => 'required|string|max:255',
        'nim' => 'nullable|string|max:30',
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
    ]);

    Aspirasi::create([
        'nama' => $validated['nama'],
        'nim' => $validated['nim'] ?? null,
        'kategori' => null,
        'judul' => $validated['judul'],
        'isi' => $validated['isi'],
        'status' => 'Menunggu',
    ]);

    return redirect()
        ->route('aspirasi')
        ->with('success', 'Aspirasi berhasil dikirim!');

})->name('aspirasi.store');


/*
|--------------------------------------------------------------------------
| CEK STATUS
|--------------------------------------------------------------------------
*/

// Halaman cek status
Route::get('/cek-status', function () {
    return view('cek-status');
})->name('cek.status');

// Proses cek status berdasarkan NIM
Route::post('/cek-status', [PengaduanController::class, 'cekStatus'])
    ->name('cek.status.proses');


/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

// Halaman login
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])
    ->name('admin.login');

// Proses login
Route::post('/admin/login', [AdminLoginController::class, 'login'])
    ->name('admin.login.submit');

// Logout
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])
    ->name('admin.logout');


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->name('admin.dashboard');


/*
|--------------------------------------------------------------------------
| UPDATE STATUS ASPIRASI
|--------------------------------------------------------------------------
*/

Route::match(
    ['post', 'put'],
    '/admin/aspirasi/{id}/status',
    function ($id) {

        $aspirasi = Aspirasi::findOrFail($id);

        $aspirasi->status = request('status');

        $aspirasi->save();

        return redirect()
            ->route('admin.dashboard')
            ->with(
                'success',
                'Status aspirasi berhasil diperbarui.'
            );
    }
)->name('admin.aspirasi.status');


/*
|--------------------------------------------------------------------------
| UPDATE STATUS PENGADUAN
|--------------------------------------------------------------------------
*/

Route::post(
    '/admin/pengaduan/{id}/status',
    [AdminController::class, 'updateStatus']
)->name('admin.pengaduan.status');

Route::post('/admin/pengumuman', [AdminController::class, 'storeAnnouncement'])
    ->name('admin.pengumuman.store');

Route::delete('/admin/pengumuman/{id}', [AdminController::class, 'deleteAnnouncement'])
    ->name('admin.pengumuman.destroy');

Route::post('/admin/lomba', [AdminController::class, 'storeLomba'])
    ->name('admin.lomba.store');

Route::delete('/admin/lomba/{id}', [AdminController::class, 'deleteLomba'])
    ->name('admin.lomba.destroy');


/*
|--------------------------------------------------------------------------
| REDIRECT /admin KE DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin', function () {

  

 // Gunakan session yang sama dengan AdminLoginController
    if (!session('admin_logged_in')) {
        return redirect()->route('admin.login');
    }

    return redirect()->route('admin.dashboard');

})->name('admin');


/*
|--------------------------------------------------------------------------
| SELESAI
|--------------------------------------------------------------------------
*/