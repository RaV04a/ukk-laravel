<?php

namespace App\Models;

use App\Livewire\Produk;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaksi;

class DetailTransaksi extends Model
{
    protected $fillable = ['transaksi-id', 'jumlah'];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class);
    
    }
    public function produk(){
        return $this->belongsTo(Produk::class);
    }
}
