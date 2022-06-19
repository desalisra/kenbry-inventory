<?php

namespace App\Database\Migrations\User;

use CodeIgniter\Database\Migration;

class Init extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'int',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'varchar',
                'constraint' => 164
            ],
            'email' => [
                'type' => 'varchar',
                'constraint' => 128,
                'unique' => true,
            ],
            'password' => [
                'type' => 'blob'
            ],
        ]);

        $this->forge->addKey('id', true);
        return $this->forge->createTable('users');
    }

    public function down()
    {
        //Drop Table users
        return $this->forge->dropTable('users', true);
    }
}

