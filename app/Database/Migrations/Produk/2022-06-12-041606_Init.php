<?php

namespace App\Database\Migrations\Produk;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table M_Produk
        $this->forge->addField([
            'prd_id' => [
                'type' => 'varchar',
                'constraint' => 4,
            ],
            'prd_nama' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true
            ],
            'prd_jenis' => [
                'type'       => 'ENUM',
                'constraint' => ['Granit', 'Marmer'],
                'default'    => 'Granit',
            ],
            'prd_lokal' => [
                'type'       => 'ENUM',
                'constraint' => ['Lokal', 'Import'],
                'default'    => 'Lokal',
            ],
            'prd_lebar' => [
                'type' => 'float',
                'null' => true
            ],
            'prd_panjang' => [
                'type' => 'float',
                'null' => true
            ],
            'prd_harga' => [
                'type' => 'float',
                'null' => true
            ],
            'prd_aktifYN' => [
                'type' => 'char',
            ],
            'prd_updateTime' => [
                'type' => 'datetime',
            ],
        ]);

        $this->forge->addKey('prd_id', true);
        return $this->forge->createTable('m_produk', true);
    }

    public function down()
    {
        //Drop Table m_produk
        return $this->forge->dropTable('m_produk', true);
    }
}
