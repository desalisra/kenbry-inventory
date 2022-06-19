<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $produk = $this->db->table('m_produk');
        $produk->truncate();

        //Data Dummy Produk
        for ($i=1; $i < 5; $i++) { 
            $data = [
                "prd_id" => "100$i",
                "prd_nama" => "PRODUK $i",
                "prd_panjang" => $i*2,
                "prd_lebar" => $i,
                "prd_aktifYN" => "Y",
                "prd_updateTime" => Time::now()
            ];

            $produk->insert($data);
        }
    }
}
