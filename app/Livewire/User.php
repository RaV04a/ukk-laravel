<?php

namespace App\Livewire;

use Livewire\Component;

class User extends Component
{
    public function render()
    {
        return view('livewire.user');
    }
    public function create()
    {
        return view('livewire.User.tambah', [
            'title' => 'Buat user baru',           
        ]);
    }
}
