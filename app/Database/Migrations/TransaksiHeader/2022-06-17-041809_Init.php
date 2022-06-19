<?php

namespace App\Database\Migrations\TransaksiHeader;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Table tb_stok_header
        $this->forge->addField([
            'trnh_id' => [
                'type' => 'varchar',
                'constraint' => 6,
            ],
            'trnh_refrensi' => [
                'type' => 'varchar',
                'constraint' => 50,
                'null' => true
            ],
            'trnh_deskripsi' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true
            ],
            'trnh_jenis' => [
                'type' => 'varchar',
                'constraint' => 5,
                'null' => true
            ],
            'trnh_date' => [
                'type' => 'datetime',
                'null' => true
            ],
            'trnh_updateTime' => [
                'type' => 'datetime',
                'null' => true
            ],
        ]);

        $this->forge->addKey('trnh_id', true);
        return $this->forge->createTable('transaksi_header', true);
    }

    public function down()
    {
        ////Drop Table tb_stok_header
        return $this->forge->dropTable('transaksi_header', true);
    }
}
