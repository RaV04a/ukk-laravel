<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Products;

class Produk extends Component
{
    public $products;
    public $nama_produk, $harga, $productId;
    public $isEditMode = false;

    public function render()
    {
        $this->products = Products::all();
        return view('livewire.produk');
    }

    public function store()
    {
        $this->validate([
            'nama_produk' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        Products::create([
            'nama_produk' => $this->nama_produk,
            'harga' => $this->harga,
        ]);

        session()->flash('message', 'Product created successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $product = Products::findOrFail($id);
        $this->productId = $id;
        $this->nama_produk = $product->nama_produk;
        $this->harga = $product->harga;
    
        $this->dispatch('showEditModal'); // Ini akan memunculkan modal
    }    
    
    public function update()
    {
        $this->validate([
            'nama_produk' => 'required|string',
            'harga' => 'required|numeric',
        ]);
    
        if ($this->productId) {
            $product = Products::find($this->productId);
            $product->update([
                'nama_produk' => $this->nama_produk,
                'harga' => $this->harga,
            ]);
    
            session()->flash('message', 'Product updated successfully.');
            $this->resetInputFields();
    
            $this->dispatch('hideEditModal'); // Ini akan menutup modal setelah update berhasil
        }
    }
    
    private function resetInputFields()
    {
        $this->nama_produk = '';
        $this->harga = '';
        $this->productId = null;
    }

    public function destroy($id)
    {
        logger("Attempting to delete product with ID: $id");
    
        $product = Products::find($id);
    
        if ($product) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully.');
        } else {
            session()->flash('error', 'Product not found.');
        }
    }
    
}
