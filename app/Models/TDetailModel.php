<?php

namespace App\Models;

use CodeIgniter\Model;

class TDetailModel extends Model
{
  protected $table            = 'transaksi_detail';
  protected $primaryKey       = ['trnd_id', 'trnd_produkId'];
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['trnd_id', 'trnd_produkId', 'trnd_qty', 'trnd_ket', 'trnd_updateTime'];


  public function inDetailInsert($data)
  {
    $sql = "INSERT INTO transaksi_detail (trnd_id, trnd_produkId, trnd_qty, trnd_ket, trnd_updateTime)
            VALUES (:trnd_id:, :trnd_produkId:, :trnd_qty:, :trnd_ket:, :trnd_updateTime:)";
    return $this->query($sql, $data);
  }

  public function getDetail($id){
    $sql = "SELECT * 
            FROM transaksi_detail
            LEFT JOIN m_produk on trnd_produkId = prd_id
            WHERE trnd_id = '$id'";
    $query = $this->query($sql);
    return $query->getResult();
  }
}