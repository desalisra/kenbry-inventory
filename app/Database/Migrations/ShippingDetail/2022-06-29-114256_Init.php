<?php

namespace App\Database\Migrations\ShippingDetail;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table T_Shipping_Detail
        $this->forge->addField([
            'ship_number' => [
                'type' => 'varchar',
                'constraint' => 12,
            ],
            'ship_iteno' => [
                'type' => 'varchar',
                'constraint' => 4,
            ],
            'ship_qty' => [
                'type' => 'float',
            ],
            'ship_keterangan' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true,
            ],
        ]);

        $this->forge->addKey('ship_number', true);
        $this->forge->addKey('ship_iteno', true);
        return $this->forge->createTable('T_Shipping_Detail', true);
    }

    public function down()
    {
        //Drop Table T_Shipping_Detail
        return $this->forge->dropTable('T_Shipping_Detail', true);
    }
}
