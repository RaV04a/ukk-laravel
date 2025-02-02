<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyData extends Seeder
{
    public function run(): void
    {
        $user = new user();
        $user->name = 'Rangga';
        $user->username = 'rav04';
        $user->password = bcrypt('123');
        $user->peran = 'kasir';
        $user->save();
    }
}
