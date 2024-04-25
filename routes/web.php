<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\GalleryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/index', function () {
    return view('index');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/dataFoto', function () {
    return view('admin.dataFoto.dataFoto');
});
Route::get('/dataAlbum', function () {
    return view('admin.dataAlbum.dataAlbum');
});
Route::get('/tambahAlbum', function () {
    return view('admin.dataAlbum.tambahAlbum');
});
Route::get('/tambahFoto', function () {
    return view('admin.dataFoto.tambahFoto');
});

// crud album
Route::get('/album/tambahAlbum', [AlbumController::class,'create']);
Route::post('/album/tambahAlbum', [AlbumController::class,'store']);
Route::get('/dataAlbum', [AlbumController::class, 'index']);
Route::delete('/album/{album}', [AlbumController::class, 'destroy'])->name('album.destroy');
Route::get('/dataAlbum/editAlbum/{album}', [AlbumController::class, 'edit'])->name('album.edit');
Route::put('/dataAlbum/update/{album}', [AlbumController::class, 'update'])->name('album.update');

// crud foto
Route::post('/foto/tambahFoto', [FotoController::class,'store']);
Route::get('/dataFoto', [FotoController::class, 'index']);
Route::get('/foto/tambahFoto', [FotoController::class, 'create'])->name('tambahFoto');
Route::delete('/dataFoto/{id}', [FotoController::class, 'destroy']);
Route::get('/dataFoto/editFoto/{id}', [FotoController::class, 'edit']);
Route::put('/dataFoto/update/{id}', [FotoController::class, 'update']);

// gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// like foto
Route::post('/like/{foto}', [FotoController::class, 'toggleLike'])->name('like.toggle');

// komentar foto
Route::post('/gallery/{foto}/comment', [FotoController::class, 'storeComment'])->name('foto.comment');
Route::get('/detail/{foto}', [FotoController::class, 'show'])->name('foto.show');

// category
Route::get('/index', [AlbumController::class, 'category'])->name('index');
