<?php

namespace App\Database\Migrations\Stock;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table M_Produk
        $this->forge->addField([
            'stk_iteno' => [
                'type' => 'varchar',
                'constraint' => 4,
            ],
            'stk_qty' => [
                'type' => 'float',
                'null' => true
            ],
            'stk_updateTime' => [
                'type' => 'datetime',
            ],
        ]);

        $this->forge->addKey('stk_iteno', true);
        return $this->forge->createTable('M_Stock', true);
    }

    public function down()
    {
        //Drop Table M_Stock
        return $this->forge->dropTable('M_Stock', true);
    }
}
