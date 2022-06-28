<?php

namespace App\Database\Migrations\Customer;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table M_Customer
        $this->forge->addField([
            'cus_id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'cus_nama' => [
                'type' => 'varchar',
                'constraint' => 100
            ],
            'cus_tlpn' => [
                'type' => 'varchar',
                'constraint' => 15
            ],
            'cus_alamat' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true
            ],
            'cus_updateId' => [
                'type' => 'varchar',
                'constraint' => 7,
                'null' => true
            ],
            'cus_updateTime' => [
                'type' => 'datetime'
            ],
        ]);

        $this->forge->addKey('cus_id', true);
        return $this->forge->createTable('M_Customer', true);
    }

    public function down()
    {
        //Drop Table M_Customer
        return $this->forge->dropTable('M_Customer', true);
    }
}
