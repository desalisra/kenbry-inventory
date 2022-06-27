<?php

namespace App\Database\Migrations\Karyawan;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        //Create Table M_Karyawan
        $this->forge->addField([
            'kry_nip' => [
                'type' => 'varchar',
                'constraint' => 7,
            ],
            'kry_nama' => [
                'type' => 'varchar',
                'constraint' => 100
            ],
            'kry_jk' => [
                'type'       => 'ENUM',
                'constraint' => ['L', 'P'],
                'default'    => 'L',
            ],
            'kry_tglLahir' => [
                'type' => 'date'
            ],
            'kry_jabatan' => [
                'type' => 'varchar',
                'constraint' => 100,
                'null' => true
            ],
            'kry_alamat' => [
                'type' => 'varchar',
                'constraint' => 50,
                'null' => true
            ],
            'kry_tlpn' => [
                'type' => 'varchar',
                'constraint' => 15,
                'null' => true
            ],
            'kry_email' => [
                'type' => 'varchar',
                'constraint' => 50,
                'null' => true
            ],
        ]);

        $this->forge->addKey('kry_nip', true);
        return $this->forge->createTable('M_Karyawan', true);
    }

    public function down()
    {
        //Drop Table M_Karyawan
        return $this->forge->dropTable('M_Karyawan', true);
    }
}
