<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PelangganController;

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

// Upload File
Route::post('upload-file', [FileController::class, 'upload'])->name('upload_file.upload');

// Cart 
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

// Produk
Route::get('list-produk', [ProdukController::class, 'produkList'])->name('produk.list');
Route::get('list-produk/detail/{id}', [ProdukController::class, 'show'])->name('produk.show');
Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('produk/store', [ProdukController::class, 'store'])->name('produk.store');
Route::get('produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

// Kategori
Route::get('Kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('Kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('Kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('Kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::put('Kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('Kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// Pelanggan
Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
Route::get('pelanggan/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
Route::put('pelanggan/update{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
Route::delete('pelanggan/destroy/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

// Supplier
Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::put('supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('supplier/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

// User
Route::get('user', [UserController::class, 'index'])->name('user.index');
