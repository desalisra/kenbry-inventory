<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Member extends Seeder
{
    public function run()
    {
        $member = $this->db->table('M_Member');
        $member->truncate();
        $password = password_hash("123456", PASSWORD_DEFAULT);

        $data = [
            'mem_nip' => "P000001",
            'mem_nama' => "Admin",
            'mem_email' => "admin@mail.com",
            'mem_password' => $password,
            'mem_role' => 0
        ];

        $member->insert($data);
    }
}
