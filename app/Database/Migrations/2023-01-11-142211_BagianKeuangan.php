<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BagianKeuangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bagian_keuangan' => [
                'type' => 'varchar',
                'constraint' => '100',
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'no_tlp' => [
                'type' => 'varchar',
                'constraint' => '30'
            ]
        ]);

        $this->forge->addKey('id_bagian_keuangan', TRUE);

        $this->forge->createTable('bagian_keuangan', TRUE);   
    }

    public function down()
    {
        $this->forge->dropTable('bagian_keuangan');
    }
}
