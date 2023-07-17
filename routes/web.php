<?php

use App\Http\Controllers\beritaController;
use App\Http\Controllers\potensiController;
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

Route::get('/', function () {
    return view('home');
});

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