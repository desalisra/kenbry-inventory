<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Produk extends Seeder
{
    public function run()
    {
        $produk = $this->db->table('M_Produk');
        $produk->truncate();
        $datetime = Time::now('Asia/Jakarta', 'id_ID');


        $produk->insert($data);
    }
}
