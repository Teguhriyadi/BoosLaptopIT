<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BebasOperasional extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_beban' => [
                'type' => 'varchar',
                'constraint' => '100',
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'nominal' => [
                'type' => 'int',
                'constraint' => 11
            ],
        ]);

        $this->forge->addKey('id_beban', TRUE);

        $this->forge->createTable('beban_operasional', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('beban_operasional');
    }
}
