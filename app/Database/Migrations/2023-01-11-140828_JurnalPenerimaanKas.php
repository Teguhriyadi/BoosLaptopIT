<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JurnalPenerimaanKas extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nominal_penerimaan' => [
                'type' => 'int',
                'constraint' => 11,
            ],
            'posisi_db_cr' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);

        $this->forge->addKey('nominal_penerimaan', TRUE);

        $this->forge->createTable('jurnal_penerimaan_kas', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('jurnal_penerimaan_kas');
    }
}
