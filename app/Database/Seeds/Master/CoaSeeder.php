<?php

namespace App\Database\Seeds\Master;

use CodeIgniter\Database\Seeder;

class CoaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_coa' => 'CA-01',
                'nama_coa' => 'Mohammad Hamdan',
                'header_coa' => 'mohammad-hamdan'
            ],
            [
                'kode_coa' => 'CA-02',
                'nama_coa' => 'Mohammad Ilham',
                'header_coa' => 'mohammad-ilham'
            ]
        ];

        $this->db->table("coa")->insertBatch($data);
    }
}
