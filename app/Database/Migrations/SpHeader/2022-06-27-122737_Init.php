<?php

namespace App\Database\Migrations\SpHeader;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table T_Sp_Header
        $this->forge->addField([
            'sph_number' => [
                'type' => 'varchar',
                'constraint' => 12,
            ],
            'sph_cusId' => [
                'type' => 'int',
            ],
            'sph_tanggal' => [
                'type'       => 'date',
            ],
            'sph_deskripsi' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null' => true,
            ],
            'sph_total' => [
                'type'       => 'float',
            ],
            'sph_status' => [
                'type'       => 'ENUM',
                'constraint' => ['Pesanan', 'Confirm', 'Send'],
                'default'    => 'Pesanan',
            ],
            'sph_updateId' => [
                'type'       => 'varchar',
                'constraint' => 7,
            ],
            'sph_updateTime' => [
                'type' => 'datetime',
            ],
        ]);

        $this->forge->addKey('sph_number', true);
        return $this->forge->createTable('T_Sp_Header', true);
    }

    public function down()
    {
        //Drop Table T_Sp_Header
        return $this->forge->dropTable('T_Sp_Header', true);
    }
}
