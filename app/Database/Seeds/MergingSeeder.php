<?php

namespace App\Database\Seeds;

use App\Database\Seeds\Akun\UserSeeder;
use App\Database\Seeds\Master\CoaSeeder;
use CodeIgniter\Database\Seeder;

class MergingSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
    }
}
