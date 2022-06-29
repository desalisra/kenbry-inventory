<?php

namespace App\Database\Migrations\Member;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mem_id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'mem_nip' => [
                'type' => 'varchar',
                'constraint' => 7
            ],
            'mem_nama' => [
                'type' => 'varchar',
                'constraint' => 100,
            ],
            'mem_email' => [
                'type' => 'varchar',
                'constraint' => 100,
                'unique' => true,
            ],
            'mem_password' => [
                'type' => 'blob'
            ],
            'mem_role' => [
                'type'       => 'ENUM',
                'constraint' => ['ADMIN', 'FINANCE', 'GUDANG'],
                'default'    => 'ADMIN',
            ],
        ]);

        $this->forge->addKey('mem_id', true);
        return $this->forge->createTable('M_Member');
    }

    public function down()
    {
        //Drop Table M_Member
        return $this->forge->dropTable('M_Member', true);
    }
}

