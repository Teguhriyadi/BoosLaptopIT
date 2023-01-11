<?php

namespace App\Database\Seeds\Akun;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'ahmad-fauzi',
                'password' => password_hash("password", PASSWORD_DEFAULT)
            ],
            [
                'username' => 'hamdan',
                'password' => password_hash("password", PASSWORD_DEFAULT)
            ]
        ];

        $this->db->table("users")->insertBatch($data);
    }
}
