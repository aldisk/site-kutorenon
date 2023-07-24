<?php

use App\Http\Controllers\anggaranController;
use App\Http\Controllers\beritaController;
use App\Http\Controllers\dokumenController;
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

Route::get('/berita/{id}', [publicController::class, 'viewBerita']);

Route::get('/admin', function () {
    return view('dashboard');
}) -> middleware(AuthCheck::class);


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