<?php

namespace App\Database\Migrations\TransaksiDetail;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Table tb_stok_header
        $this->forge->addField([
            'trnd_id' => [
                'type' => 'varchar',
                'constraint' => 6,
            ],
            'trnd_produkId' => [
                'type' => 'char',
                'null' => true
            ],
            'trnd_qty' => [
                'type' => 'int',
                'null' => true
            ],
            'trnd_updateTime' => [
                'type' => 'datetime',
                'null' => true
            ],
        ]);

        $this->forge->addKey('trn_id', true);
        $this->forge->addKey('trnd_produkid', true);
        
        return $this->forge->createTable('transaksi_detail', true);
    }

    public function down()
    {
        ////Drop Table tb_stok_header
        return $this->forge->dropTable('transaksi_detail', true);
    }
}
