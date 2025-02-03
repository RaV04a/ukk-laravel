<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyData extends Seeder
{
    public function run(): void
    {
        $user = new User();
        $user->name = env('USER_NAME'); // Default value if env is not set
        $user->username = env('USER_USERNAME');
        $user->password = bcrypt(env('USER_PASSWORD'));
        $user->peran = env('USER_PERAN');
        $user->save();

        //ini kontol rangga
    }
}
