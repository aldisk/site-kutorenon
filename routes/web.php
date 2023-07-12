<?php

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

Route::get('/admin/login', function () {
    return view('login');
}) -> middleware(NoAuthCheck::class);

Route::post('/admin/login/auth', [adminController::class, 'login']
) -> middleware(NoAuthCheck::class) -> name('DashLogin');