<?php

namespace App\Models;

use CodeIgniter\Model;

class ReceivingModel extends Model
{
  protected $table            = 't_receiving_header';
  protected $returnType       = 'object';

  public function generateId()
  {
    $month = date("m");
    $sql = "SELECT recv_number FROM t_receiving_header WHERE left(recv_number,4) = 'IN$month' ORDER BY recv_number DESC LIMIT 1";
    $query = $this->query($sql);
    $lastId = $query->getRow();

    if(is_null($lastId->recv_number)){
      return "IN" . $month . "01";
    }else{
      $urut = substr($lastId->recv_number,4,2);
      $urut++;
      if($urut < 10){
        return "IN" . $month . "0" . $urut;
      }else{
        return "IN" . $month . $urut;
      }
    }
  }

  public function getHeader($id = null)
  {
    if(!is_null($id)){
      $sql = "SELECT * FROM t_receiving_header WHERE recv_number = '$id'";
      $query = $this->query($sql);
      return $query->getRow();
    }else{
      $sql = "SELECT * FROM t_receiving_header";
      $query = $this->query($sql);
      return $query->getResult();
    }
  }

  public function getDetail($id)
  {
    $sql = "SELECT * 
            FROM t_receiving_detail 
            LEFT JOIN m_produk ON recv_iteno = prd_id
            WHERE recv_number = '$id'";
    $query = $this->query($sql);
    return $query->getResult();
  }

  public function insertHeader($data)
  {
    $sql = "INSERT INTO t_receiving_header (recv_number, recv_tanggal, recv_deskripsi, recv_updateId, recv_updateTime)
            VALUES (:recv_number:, :recv_tanggal:, :recv_deskripsi:, :recv_updateId:, :recv_updateTime:)";
    return $this->query($sql, $data);
  }

  public function insertDetail($data)
  {
    $sql = "INSERT INTO t_receiving_detail (recv_number, recv_iteno, recv_qty, recv_keterangan)
            VALUES (:recv_number:, :recv_iteno:, :recv_qty:, :recv_keterangan:)";
    return $this->query($sql, $data);
  }

  // public function updateHeader($data)
  // {
  //   $sql = "UPDATE t_receiving_header 
  //           SET recv_tanggal = :recv_tanggal:,
  //               recv_deskripsi = :recv_deskripsi:
  //           WHERE recv_number = :recv_number:";
  //   return $this->query($sql, $data);
  // }

  // public function deleteProduk($id)
  // {
  //   $sql = "DELETE FROM t_receiving_header WHERE recv_number = '$id' ";
  //   return $this->query($sql);
  // }
}