<?php

namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
  protected $table            = 't_stock';
  protected $primaryKey       = 'stock_id';
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['stock_id', 'stock_produk', 'stock_qty', 'stock_updateTime'];

  public function insertStock($data)
  {
    $sql = "INSERT INTO t_stock (stock_produk, stock_qty, stock_updateTime)
            VALUES (:stock_produk:, :stock_qty:, :stock_updateTime:)";
    return $this->query($sql, $data);
  }

  public function updateStock($data)
  {
    $sql = "UPDATE t_stock 
            SET stock_qty = stock_qty + :stock_qty:,
                stock_updateTime = :stock_updateTime:
            WHERE stock_produk = :stock_produk:";
    return $this->query($sql, $data);
  }

  public function minStock($data)
  {
    $sql = "UPDATE t_stock 
            SET stock_qty = stock_qty - :stock_qty:,
                stock_updateTime = :stock_updateTime:
            WHERE stock_produk = :stock_produk:";
    return $this->query($sql, $data);
  }

  public function cekStock($produkId, $qty){
    $sql = "SELECT stock_qty - $qty AS qty FROM t_stock WHERE stock_produk = '$produkId'";
    $query = $this->query($sql);
    return $query->getRow();
  }

  public function getDataStock(){
    $sql = "SELECT * 
            FROM t_stock
            LEFT JOIN m_produk ON stock_produk = prd_id
            WHERE stock_qty > 0";
    $query = $this->query($sql);
    return $query->getResult();
  }
}