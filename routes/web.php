<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\livewire\Beranda;
use App\livewire\User;
use App\livewire\Produk;
use App\livewire\Transaksi; 
use App\livewire\Laporan;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', Beranda::class)->middleware(['auth'])->name('home');
Route::get('/user', User::class)->middleware(['auth'])->name('user');
Route::get('/produk', Produk::class)->middleware(['auth'])->name('produk');
Route::get('/transaksi', Transaksi::class)->middleware(['auth'])->name('transaksi');
Route::get('/laporan', Laporan::class)->middleware(['auth'])->name('laporan');
Route::get('/tambah', Laporan::class)->middleware(['auth'])->name('tambah');
// Route::get('/cetak', ['App\Http\Controllers\HomeController', 'cetak']);