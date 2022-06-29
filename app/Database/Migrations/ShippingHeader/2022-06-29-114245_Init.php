<?php

namespace App\Database\Migrations\ShippingHeader;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table T_Shipping_Header
        $this->forge->addField([
            'ship_number' => [
                'type' => 'varchar',
                'constraint' => 12,
            ],
            'ship_cusId' => [
                'type' => 'int',
            ],
            'ship_tanggal' => [
                'type'       => 'date',
            ],
            'ship_deskripsi' => [
                'type'       => 'varchar',
                'constraint' => 255,
                'null' => true,
            ],
            'ship_updateId' => [
                'type'       => 'varchar',
                'constraint' => 7,
            ],
            'ship_updateTime' => [
                'type' => 'datetime',
            ],
        ]);

        $this->forge->addKey('ship_number', true);
        return $this->forge->createTable('T_Shipping_Header', true);
    }

    public function down()
    {
        ///Drop Table T_Shipping_Header
        return $this->forge->dropTable('T_Shipping_Header', true);
    }
}
