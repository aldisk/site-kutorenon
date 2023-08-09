<?php

use App\Http\Controllers\anggaranController;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\dokumenController;
use App\Http\Controllers\fasilitasController;
use App\Http\Controllers\layananController;
use App\Http\Controllers\lembagaController;
use App\Http\Controllers\potensiController;
use App\Http\Controllers\publicController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\NoAuthCheck;
use App\Http\Middleware\AuthCheck;
use App\Http\Controllers\adminController;

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

Route::get('/', [publicController::class, 'homepage']);

Route::get('/tugas', function () {
    return view('view-tugas');
});

Route::get('/profil', function () {
    return view('view-profil');
});

Route::get('/pejabat', function () {
    return view('view-pejabat');
});

Route::get('/berita/search', [publicController::class, 'beritaPage']) -> name('searchBerita');

Route::get('/berita/view/{id}', [publicController::class, 'viewBerita']);

Route::get('/potensi', [publicController::class, 'potensiPage']);

Route::get('/potensi/view/{slug}', [publicController::class, 'viewPotensi']);

Route::get('/fasilitas', [publicController::class, 'fasilitasPage']);

Route::get('/fasilitas/view/{slug}', [publicController::class, 'viewFasilitas']);

Route::get('/lembaga', [publicController::class, 'lembagaPage']);

Route::get('/lembaga/view/{id}', [publicController::class, 'viewLembaga']);

Route::get('/anggaran', [publicController::class, 'anggaranPage']);

Route::get('/dokumen', [publicController::class, 'dokumenPage']);

Route::get('/layanan', [publicController::class, 'layananPage']);

Route::get('/layanan/redirect/{id}', [publicController::class, 'layananRedirect']);

Route::get('/admin/', [adminController::class, 'dashboardPage']
) -> middleware(AuthCheck::class);


// Account
Route::get('/admin/login', function () {
    return view('login');
}) -> middleware(NoAuthCheck::class);

Route::post('/admin/login/auth', [adminController::class, 'login']
) -> middleware(NoAuthCheck::class) -> name('DashLogin');

Route::get('/admin/logout', [adminController::class, 'logout']
) -> middleware(AuthCheck::class);


// Berita
Route::get('/admin/berita/insert', function () {
    return view('dashboard', ['mode' => 'insert', 'tab' => 'berita']);
}) -> middleware(AuthCheck::class);

Route::post('/admin/berita/edit/auth', [beritaController::class, 'editBerita']
) -> middleware(AuthCheck::class) -> name ('BeritaUpdate');

Route::get('/admin/berita/edit/{id}', [beritaController::class, 'editPage']
) -> middleware(AuthCheck::class);

Route::get('/admin/berita/delete/{id}', [beritaController::class, 'deleteBerita']
) -> middleware(AuthCheck::class);

Route::get('/admin/berita', [beritaController::class, 'pagedManageBeritas']
) -> middleware(AuthCheck::class) -> name('BeritaManage');

Route::post('/admin/berita/insert/auth', [beritaController::class, 'insert']
) -> middleware(AuthCheck::class) -> name('BeritaInsert');

// Potensi
Route::get('/admin/potensi', [potensiController::class, 'pagedManagePotensi']
) -> middleware(AuthCheck::class) -> name('PotensiManage');

Route::get('/admin/potensi/insert', function () {
    return view('dashboard', ['mode' => 'insert', 'tab' => 'potensi']);
}) -> middleware(AuthCheck::class);

Route::post('/admin/potensi/insert/auth', [potensiController::class, 'insert']
) -> middleware(AuthCheck::class) -> name('PotensiInsert');

Route::get('/admin/potensi/edit/{id}', [potensiController::class, 'editPage']
) -> middleware(AuthCheck::class);

Route::post('/admin/potensi/edit/auth', [potensiController::class, 'editPotensi']
) -> middleware(AuthCheck::class) -> name ('PotensiUpdate');

Route::get('/admin/potensi/delete/{id}', [potensiController::class, 'deletePotensi']
) -> middleware(AuthCheck::class);

//Dokumen
Route::get('/admin/dokumen', [dokumenController::class, 'pagedManageDokumen']
) -> middleware(AuthCheck::class) -> name('DokumenManage');

Route::get('/admin/dokumen/insert', function () {
    return view('dashboard', ['mode' => 'insert', 'tab' => 'dokumen']);
}) -> middleware(AuthCheck::class);

Route::post('/admin/dokumen/insert/auth', [dokumenController::class, 'insert']
) -> middleware(AuthCheck::class) -> name('DokumenInsert');

Route::get('/admin/dokumen/edit/{id}', [dokumenController::class, 'editPage']
) -> middleware(AuthCheck::class);

Route::post('/admin/dokumen/edit/auth', [dokumenController::class, 'editDokumen']
) -> middleware(AuthCheck::class) -> name ('DokumenUpdate');

Route::get('/admin/dokumen/delete/{id}', [dokumenController::class, 'deleteDokumen']
) -> middleware(AuthCheck::class);

//Anggaran
Route::get('/admin/anggaran', [anggaranController::class, 'pagedManageDokumen']
) -> middleware(AuthCheck::class) -> name('AnggaranManage');

Route::get('/admin/anggaran/insert', function () {
    return view('dashboard', ['mode' => 'insert', 'tab' => 'anggaran']);
}) -> middleware(AuthCheck::class);

Route::post('/admin/anggaran/insert/auth', [anggaranController::class, 'insert']
) -> middleware(AuthCheck::class) -> name('AnggaranInsert');

Route::get('/admin/anggaran/edit/{id}', [anggaranController::class, 'editPage']
) -> middleware(AuthCheck::class);

Route::post('/admin/anggaran/edit/auth', [anggaranController::class, 'editDokumen']
) -> middleware(AuthCheck::class) -> name ('AnggaranUpdate');

Route::get('/admin/anggaran/delete/{id}', [anggaranController::class, 'deleteDokumen']
) -> middleware(AuthCheck::class);

//Lembaga
Route::get('/admin/lembaga', [lembagaController::class, 'pagedManageLembaga']
) -> middleware(AuthCheck::class) -> name('LembagaManage');

Route::get('/admin/lembaga/insert', function () {
    return view('dashboard', ['mode' => 'insert', 'tab' => 'lembaga']);
}) -> middleware(AuthCheck::class);

Route::post('/admin/lembaga/insert/auth', [lembagaController::class, 'insert']
) -> middleware(AuthCheck::class) -> name('LembagaInsert');

Route::get('/admin/lembaga/edit/{id}', [lembagaController::class, 'editPage']
) -> middleware(AuthCheck::class);

Route::post('/admin/lembaga/edit/auth', [lembagaController::class, 'editLembaga']
) -> middleware(AuthCheck::class) -> name ('LembagaUpdate');

Route::get('/admin/lembaga/delete/{id}', [lembagaController::class, 'deleteLembaga']
) -> middleware(AuthCheck::class);

//Fasilitas
Route::get('/admin/fasilitas', [fasilitasController::class, 'pagedManageFasilitas']
) -> middleware(AuthCheck::class) -> name('FasilitasManage');

Route::get('/admin/fasilitas/insert', function () {
    return view('dashboard', ['mode' => 'insert', 'tab' => 'fasilitas']);
}) -> middleware(AuthCheck::class);

Route::post('/admin/fasilitas/insert/auth', [fasilitasController::class, 'insert']
) -> middleware(AuthCheck::class) -> name('FasilitasInsert');

Route::get('/admin/fasilitas/edit/{id}', [fasilitasController::class, 'editPage']
) -> middleware(AuthCheck::class);

Route::post('/admin/fasilitas/edit/auth', [fasilitasController::class, 'editFasilitas']
) -> middleware(AuthCheck::class) -> name ('FasilitasUpdate');

Route::get('/admin/fasilitas/delete/{id}', [fasilitasController::class, 'deleteFasilitas']
) -> middleware(AuthCheck::class);

//Layanan
Route::get('/admin/layanan', [layananController::class, 'pagedManageLayanan']
) -> middleware(AuthCheck::class) -> name('LayananManage');

Route::get('/admin/layanan/insert', function () {
    return view('dashboard', ['mode' => 'insert', 'tab' => 'layanan']);
}) -> middleware(AuthCheck::class);

Route::post('/admin/layanan/insert/auth', [layananController::class, 'insert']
) -> middleware(AuthCheck::class) -> name('LayananInsert');

Route::get('/admin/layanan/edit/{id}', [layananController::class, 'editPage']
) -> middleware(AuthCheck::class);

Route::post('/admin/layanan/edit/auth', [layananController::class, 'editLayanan']
) -> middleware(AuthCheck::class) -> name ('LayananUpdate');

Route::get('/admin/layanan/delete/{id}', [layananController::class, 'deleteLayanan']
) -> middleware(AuthCheck::class);