<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataPenerimaanKas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penerimaan' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'id_servis_laptop' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'subtotal_penerimaan_kas' => [
                'type' => 'int',
                'constraint' => 11
            ]
        ]);

        $this->forge->addKey('id_penerimaan', TRUE);

        $this->forge->createTable('data_penerimaan_kas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('data_penerimaan_kas');
    }
}
