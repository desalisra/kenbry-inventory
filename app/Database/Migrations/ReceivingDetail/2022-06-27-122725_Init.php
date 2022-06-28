<?php

namespace App\Database\Migrations\ReceivingDetail;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table T_Receiving_Detail
        $this->forge->addField([
            'recv_number' => [
                'type' => 'varchar',
                'constraint' => 6,
            ],
            'recv_iteno' => [
                'type' => 'varchar',
                'constraint' => 4,
            ],
            'recv_qty' => [
                'type' => 'float',
            ],
            'recv_keterangan' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true,
            ],
        ]);

        $this->forge->addKey('recv_number', true);
        $this->forge->addKey('recv_iteno', true);
        return $this->forge->createTable('T_Receiving_Detail', true);
    }

    public function down()
    {
       //Drop Table T_Receiving_Header
       return $this->forge->dropTable('T_Receiving_Detail', true);
    }
}
