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

  public function pergerakanBarang(){
    $sql = "SELECT number, tanggal, kdProduk, nmProduk, qty, panjang, lebar
    FROM (
      SELECT A.recv_number AS number,A.recv_tanggal AS tanggal,recv_iteno AS kdProduk,prd_nama AS nmProduk,
      C.prd_panjang AS panjang, C.prd_lebar AS lebar, recv_qty AS qty
      FROM t_receiving_header A
      LEFT JOIN t_receiving_detail B ON A.recv_number = B.recv_number 
      LEFT JOIN m_produk C ON B.recv_iteno = C.prd_id 
      UNION
      SELECT A.ship_number AS number,A.ship_tanggal AS tanggal, B.ship_iteno AS kdProduk, C.prd_nama AS nmProduk,
      C.prd_panjang AS panjang, C.prd_lebar AS lebar, B.ship_qty AS qty
      FROM t_shipping_header A
      LEFT JOIN t_shipping_detail B ON A.ship_number = B.ship_number
      LEFT JOIN m_produk C ON B.ship_iteno = C.prd_id 
    ) A
    ORDER BY tanggal, number ASC";
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