<?php

namespace App\Database\Migrations\Stock;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        // Table t_stock
        $this->forge->addField([
            'stock_id' => [
                'type' => 'int',
                'auto_increment' => true
            ],
            'stock_produk' => [
                'type' => 'varchar',
                'constraint' => 4,
                'null' => true
            ],
            'stock_qty' => [
                'type' => 'int',
                'null' => true
            ],
            'stock_updateTime' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);

        $this->forge->addKey('stock_id', true);
        $this->forge->addKey('stock_produk', true);
        
        return $this->forge->createTable('t_stock', true);
    }

    public function down()
    {
        //Drop Table t_stock
        return $this->forge->dropTable('t_stock', true);
    }
}
