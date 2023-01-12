<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ServisLaptop extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'tgl_servis' => [
                'type' => 'date'
            ],
            'part_servis' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'subtotal_servis' => [
                'type' => 'int',
                'constraint' => 11
            ],
        ]);

        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('servis_laptop', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('servis_laptop');
    }
}
