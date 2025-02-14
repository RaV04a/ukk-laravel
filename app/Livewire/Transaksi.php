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

    public function transaksiBaru()
    {
        $this->reset();
        $this->transaksiAktif = new ModelsTransaksi();
        $this->transaksiAktif->kode = 'INV/' . date('YmdHis');
        $this->transaksiAktif->total = 0;
        $this->transaksiAktif->status = 'pending';
        $this->transaksiAktif->save();
    }

    public function batalTransaksi()
    {
        if ($this->transaksiAktif) {
            $this->transaksiAktif->delete();
        }
        $this->reset();
    }

    public function updatedKode()
    {
        $this->transaksiAktif = ModelsTransaksi::where('kode', $this->kode)->first();

        if ($this->transaksiAktif) {
            // Optionally, reset or update other related data
            $this->totalSemuaBelanja = DetailTransaksi::where('transaksi_id', $this->transaksiAktif->id)
                ->sum(function ($detail) {
                    return $detail->produk->harga * $detail->jumlah;
                });
        } else {
            // Handle case where transaction is not found
            $this->reset(['totalSemuaBelanja']);
        }
    }

    public function render()
    {
        $semuaProduk = $this->transaksiAktif
            ? DetailTransaksi::where('transaksi_id', $this->transaksiAktif->id)->get()
            : [];

        return view('livewire.transaksi')->with([
            'semuaProduk' => $semuaProduk
        ]);
    }

    public function hapusProduk($detailId)
{
    $detail = DetailTransaksi::find($detailId);
    if ($detail) {
        $detail->delete();
        $this->updatedKode(); // Update totals after removal
    }
}

public function updatedBayar()
{
    $this->kembalian = $this->bayar - $this->totalSemuaBelanja;
}

public function processPayment()
{
    if ($this->bayar >= $this->totalSemuaBelanja) {
        $this->transaksiAktif->status = 'completed';
        $this->transaksiAktif->save();
        session()->flash('message', 'Payment successful!');
        $this->reset();
    } else {
        session()->flash('error', 'Insufficient payment.');
    }
}

}
