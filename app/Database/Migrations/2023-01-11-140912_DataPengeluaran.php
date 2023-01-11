<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPengeluaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penerimaan' => [
                'type' => 'varchar',
                'constraint' => '100',
            ],
            'tgl_penerimaan' => [
                'type' => 'date'
            ],
            'jenis_penerimaan' => [
                'type' => 'varchar',
                'constraint' => '100'
            ]
        ]);

        $this->forge->addKey('id_penerimaan', TRUE);

        $this->forge->createTable('data_pengeluaran', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('data_pengeluaran');
    }
}
