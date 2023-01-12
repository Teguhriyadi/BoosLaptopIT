<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPengeluaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengeluaran_kas' => [
                'type' => 'varchar',
                'constraint' => '100',
            ],
            'id_beban_operasional' => [
                'type' => 'varchar',
                'constraint' => '100'
            ],
            'subtotal_pengeluaran_kas' => [
                'type' => 'varchar',
                'constraint' => '100'
            ]
        ]);

        $this->forge->addKey('id_pengeluaran_kas', TRUE);

        $this->forge->createTable('data_pengeluaran_kas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('data_pengeluaran_kas');
    }
}
