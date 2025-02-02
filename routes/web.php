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
Route::get('/', Beranda::Class)->middleware(['auth'])->name('home');
Route::get('/user', User::Class)->middleware(['auth'])->name('user');
Route::get('/produk', Produk::Class)->middleware(['auth'])->name('produk');
Route::get('/transaksi', Transaksi::Class)->middleware(['auth'])->name('transaksi');
Route::get('/laporan', Laporan::Class)->middleware(['auth'])->name('laporan');
Route::get('/cetak', ['App\Http\Controllers\HomeController', 'cetak']);
