<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Coa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_coa' => [
                'type' => 'varchar',
                'constraint' => '100',
            ],
            'nama_coa' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'header_coa' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
        ]);

        $this->forge->addKey('kode_coa', TRUE);

        $this->forge->createTable('coa', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('coa');
    }
}
