<?php

namespace App\Database\Migrations\ReceivingHeader;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table T_Receiving_Header
        $this->forge->addField([
            'recv_number' => [
                'type' => 'varchar',
                'constraint' => 6,
            ],
            'recv_tanggal' => [
                'type' => 'date',
            ],
            'recv_deskripsi' => [
                'type'       => 'varchar',
                'constraint' => 255,
            ],
            'recv_updateId' => [
                'type'       => 'varchar',
                'constraint' => 7,
            ],
            'recv_updateTime' => [
                'type' => 'datetime',
            ],
        ]);

        $this->forge->addKey('recv_number', true);
        return $this->forge->createTable('T_Receiving_Header', true);
    }

    public function down()
    {
        //Drop Table T_Receiving_Header
        return $this->forge->dropTable('T_Receiving_Header', true);
    }
}
