<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $users = $this->db->table('users');
        $users->truncate();
        $password = password_hash("123456", PASSWORD_DEFAULT);

        $data = [
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => $password,
        ];

        $users->insert($data);
    }
}
