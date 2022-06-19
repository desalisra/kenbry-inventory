<?php

namespace App\Database\Migrations\TransaksiDetail;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Table transaksi_detail
        $this->forge->addField([
            'trnd_id' => [
                'type' => 'varchar',
                'constraint' => 6,
            ],
            'trnd_produkId' => [
                'type' => 'varchar',
                'constraint' => 4,
                'null' => true
            ],
            'trnd_qty' => [
                'type' => 'int',
                'null' => true
            ],
            'trnd_ket' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true
            ],
            'trnd_updateTime' => [
                'type' => 'datetime',
                'null' => true
            ]
        ]);

        $this->forge->addKey('trnd_id', true);
        $this->forge->addKey('trnd_produkId', true);
        
        return $this->forge->createTable('transaksi_detail', true);
    }

    public function down()
    {
        //Drop Table transaksi_detail
        return $this->forge->dropTable('transaksi_detail', true);
    }
}
