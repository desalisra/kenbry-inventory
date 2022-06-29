<?php

namespace App\Models;

use CodeIgniter\Model;

class ShippingModel extends Model
{
  protected $table            = 't_shipping_header';
  protected $returnType       = 'object';

  public function getHeader($id = null)
  {
    if(!is_null($id)){
      $sql = "SELECT * FROM t_shipping_header LEFT JOIN m_customer ON ship_cusId = cus_id WHERE ship_number = '$id'";
      $query = $this->query($sql);
      return $query->getRow();
    }else{
      $sql = "SELECT * FROM t_shipping_header LEFT JOIN m_customer ON ship_cusId = cus_id";
      $query = $this->query($sql);
      return $query->getResult();
    }
  }

  public function getDetail($id)
  {
    $sql = "SELECT * 
            FROM t_shipping_detail 
            LEFT JOIN m_produk ON ship_iteno = prd_id
            WHERE ship_number = '$id'";
    $query = $this->query($sql);
    return $query->getResult();
  }

  public function insertHeader($data)
  {
    $sql = "INSERT INTO t_shipping_header (ship_number, ship_cusId, ship_tanggal, ship_deskripsi, ship_updateId, ship_updateTime)
            VALUES (:ship_number:, :ship_cusId:, :ship_tanggal:, :ship_deskripsi:, :ship_updateId:, :ship_updateTime:)";
    return $this->query($sql, $data);
  }

  public function insertDetail($data)
  {
    $sql = "INSERT INTO t_shipping_detail (ship_number, ship_iteno, ship_qty, ship_keterangan)
            VALUES (:ship_number:, :ship_iteno:, :ship_qty:, :ship_keterangan:)";
    return $this->query($sql, $data);
  }

}