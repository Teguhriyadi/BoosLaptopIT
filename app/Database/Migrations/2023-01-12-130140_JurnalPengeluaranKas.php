<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JurnalPengeluaranKas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kode_coa' => [
                'type' => 'varchar',
                'constraint' => '100',
            ],
            'header' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => '100'
            ]
        ]);

        $this->forge->addKey('kode_coa', TRUE);

        $this->forge->createTable('jurnal_pengeluaran_kas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable("jurnal_pengeluaran_kas");
    }
}
