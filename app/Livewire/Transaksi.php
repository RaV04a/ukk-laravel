<?php

namespace App\Livewire;

use App\Models\DetailTransaksi;
use Livewire\Component;
use App\Models\Transaksi as ModelsTransaksi;
use App\Models\Products;

class Transaksi extends Component
{
    public $kode, $total, $bayar, $kembalian, $totalSemuaBelanja;
    public $transaksiAktif;

    public function transaksiBaru(){
        $this->reset();
        $this->transaksiAktif = new ModelsTransaksi();
        $this->transaksiAktif->kode = 'INV/' . date('YmdHis');
        $this->transaksiAktif->total = 0;
        $this->transaksiAktif->status = 'pending';
        $this->transaksiAktif->save();
    }

    public function batalTransaksi(){
        if ($this->transaksiAktif()){
            $this->transaksiAktif->delete();
        }
        $this->reset();
    }
    public function updatedKode(){
        $produk = Products::where('kode', $this->kode)->first();
        if ($produk && $produk->stok > 0) {
            $detail= DetailTransaksi::firstOrNew([
                'transaksi_id' => $this->transaksiAktif->id,
                'produk_id' => $produk->id
            ],[
                'jumlah' => 0
            ]);
            $detail->jumlah += 1;
            $detail->save();
            $this->reset();
        }
    }
    public function render()
    {
        if ($this->transaksiAktif) {
            $semuaProduk = DetailTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get();
        } else {
            $semuaProduk = [];
        }
        return view('livewire.transaksi')->with([
            'semuaProduk' => $semuaProduk
        ]);
    }
}
