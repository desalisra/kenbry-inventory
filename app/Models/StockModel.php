<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
  protected $table            = 'M_Stock';
  protected $primaryKey       = 'stk_iteno';
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['stk_iteno', 'stk_qty', 'stk_updateTime'];

  public function getDataStock(){
    $sql = "SELECT * 
            FROM M_Stock
            LEFT JOIN m_produk ON stk_iteno = prd_id
            WHERE stk_qty > 0";
    $query = $this->query($sql);
    return $query->getResult();
  }

  public function insertStock($data)
  {
    $sql = "INSERT INTO M_Stock (stk_iteno, stk_qty, stk_updateTime)
            VALUES (:stk_iteno:, :stk_qty:, :stk_updateTime:)";
    return $this->query($sql, $data);
  }

  public function updateStock($data)
  {
    $sql = "UPDATE M_Stock 
            SET stk_qty = stk_qty + :stk_qty:,
                stk_updateTime = :stk_updateTime:
            WHERE stk_iteno = :stk_iteno:";
    return $this->query($sql, $data);
  }

  public function minStock($data)
  {
    $sql = "UPDATE M_Stock 
            SET stk_qty = stk_qty - :stk_qty:,
                stk_updateTime = :stk_updateTime:
            WHERE stk_iteno = :stk_iteno:";
    return $this->query($sql, $data);
  }

  public function cekStock($produkId, $qty){
    $sql = "SELECT stk_qty - $qty AS qty FROM M_Stock WHERE stk_iteno = '$produkId'";
    $query = $this->query($sql);
    return $query->getRow();
  }
}