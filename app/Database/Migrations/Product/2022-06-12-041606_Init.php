<?php

namespace App\Database\Migrations\Product;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Table Master Product
        $this->forge->addField([
            'prd_id' => [
                'type' => 'varchar',
                'constraint' => 4,
            ],
            'prd_name' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true
            ],
            'prd_aktifYN' => [
                'type' => 'char',
                'null' => true
            ],
            'prd_updateId' => [
                'type' => 'int',
                'null' => true
            ],
            'prd_updateTime' => [
                'type' => 'datetime',
                'null' => true
            ],
        ]);

        $this->forge->addKey('prd_id', true);
        return $this->forge->createTable('tb_product', true);
    }

    public function down()
    {
        //Drop Table Tb_Product
        return $this->forge->dropTable('tb_product', true);
    }
}
