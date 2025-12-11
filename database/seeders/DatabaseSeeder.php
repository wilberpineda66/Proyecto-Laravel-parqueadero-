<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario; //  <-- tu modelo correcto

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'rol' => 'admin',
        ]);
    }
}
