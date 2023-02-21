<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');

Route::get('Kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('Kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('Kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('Kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('Kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('Kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
