<?php

namespace App\Database\Migrations\SpDetail;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table T_Receiving_Detail
        $this->forge->addField([
            'spd_number' => [
                'type' => 'varchar',
                'constraint' => 12,
            ],
            'spd_iteno' => [
                'type' => 'varchar',
                'constraint' => 4,
            ],
            'spd_qty' => [
                'type' => 'float',
            ],
            'spd_harga' => [
                'type' => 'float',
            ],
            'spd_keterangan' => [
                'type' => 'float',
            ],
        ]);

        $this->forge->addKey('spd_number', true);
        $this->forge->addKey('spd_iteno', true);
        return $this->forge->createTable('T_Sp_Detail', true);
    }

    public function down()
    {
        //Drop Table T_Sp_Detail
        return $this->forge->dropTable('T_Sp_Detail', true);
    }
}
