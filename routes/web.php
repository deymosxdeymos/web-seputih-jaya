<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\DummyController;
use App\Http\Controllers\Admin\AdminCMSController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminArtikelController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Controllers\Client\ClientBeritaController;
use App\Http\Controllers\Client\ClientProfileController;
use App\Http\Controllers\Client\ClientGaleriController;
use App\Http\Controllers\Client\ClientEventController;
use App\Http\Controllers\Client\ClientContactController;

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

// Route::get('/', [HomeClientController::class, 'index'])->name('beranda');

Auth::routes(['register' => false,
'reset' => false,
'verify' => false,
'login' => false,
'logout' => false,]);

Route::get('/', [ClientHomeController::class, 'index'])->name('beranda');
// Route::view('/page', 'client.berita');
Route::controller(ClientBeritaController::class)->name('berita.')->prefix('berita')->group(function () {
    Route::get('/view', 'index');
    Route::get('/view/{judul}', 'show');
});
Route::controller(ClientProfileController::class)->name('profile.')->prefix('profile')->group(function () {
    Route::get('/', 'index');
});
Route::controller(ClientGaleriController::class)->name('galeri.')->prefix('galeri')->group(function () {
    Route::get('/', 'index');
});
Route::controller(ClientEventController::class)->name('event.')->prefix('event')->group(function () {
    Route::get('/', 'index');
});
Route::controller(ClientContactController::class)->name('kontak.')->prefix('kontak')->group(function () {
    Route::get('/', 'index');
});

Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('admin');
Route::post('/admin', [LoginController::class, 'login']);

Route::get('/login', [DummyController::class, 'index'])->name('login');
Route::post('/login', [DummyController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['admin'])->name('admin.')->prefix('admin')->group(function () {
        Route::resource('cms', AdminCMSController::class);
        Route::resource('profile', AdminProfileController::class);
        Route::resource('artikel', AdminArtikelController::class);
        Route::resource('galeri', AdminGaleriController::class);
        Route::resource('event', AdminEventController::class);
        });
});
