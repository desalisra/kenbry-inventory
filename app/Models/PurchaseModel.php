<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseModel extends Model
{
  protected $table            = 't_sp_header';
  protected $returnType       = 'object';

  public function generateId()
  {
    $y = substr(date("Y"), 2, 2);
    $m = date("m");
    $d = date("d");
    $kode = "INV" . $y . $m . $d;

    $sql = "SELECT sph_Number FROM t_sp_header WHERE left(sph_number,9) = '$kode' ORDER BY sph_number DESC LIMIT 1";
    $query = $this->query($sql);
    $lastId = $query->getRow();


    if(is_null($lastId)){
      return $kode . "01";
    }else{
      $urut = substr($lastId->sph_Number,8,2);
      $urut++;
      if($urut < 10){
        return $kode . "0" . $urut;
      }else{
        return $kode . $urut;
      }
    }
  }

  public function getHeaderCurrent()
  {
    $sql = "SELECT * 
            FROM t_sp_header
            LEFT JOIN m_customer ON sph_cusId = cus_id 
            WHERE DATE_FORMAT(sph_updateTime, '%Y%m%d') = DATE_FORMAT(NOW(), '%Y%m%d')  ";
    $query = $this->query($sql);
    return $query->getResult();
  }

  public function getHeaderConfirm()
  {
    $sql = "SELECT * 
            FROM t_sp_header
            LEFT JOIN m_customer ON sph_cusId = cus_id 
            WHERE sph_status = 'Confirm'";
    $query = $this->query($sql);
    return $query->getResult();
  }

  public function getHeader($id = null)
  {
    if(!is_null($id)){
      $sql = "SELECT * FROM t_sp_header LEFT JOIN m_customer ON sph_cusId = cus_id WHERE sph_number = '$id'";
      $query = $this->query($sql);
      return $query->getRow();
    }else{
      $sql = "SELECT * FROM t_sp_header LEFT JOIN m_customer ON sph_cusId = cus_id";
      $query = $this->query($sql);
      return $query->getResult();
    }
  }

  public function getDetail($id)
  {
    $sql = "SELECT * 
            FROM t_sp_detail 
            LEFT JOIN m_produk ON spd_iteno = prd_id
            WHERE spd_number = '$id'";
    $query = $this->query($sql);
    return $query->getResult();
  }

  public function insertHeader($data)
  {
    $sql = "INSERT INTO t_sp_header (sph_number, sph_cusId, sph_tanggal, sph_deskripsi,sph_total, sph_status, sph_updateId, sph_updateTime)
            VALUES (:sph_number:, :sph_cusId:, :sph_tanggal:, :sph_deskripsi:, :sph_total:, :sph_status:, :sph_updateId:, :sph_updateTime:)";
    return $this->query($sql, $data);
  }

  public function insertDetail($data)
  {
    $sql = "INSERT INTO t_sp_detail (spd_number, spd_iteno, spd_qty, spd_harga, spd_keterangan)
            VALUES (:spd_number:, :spd_iteno:, :spd_qty:, :spd_harga:, :spd_keterangan:)";
    return $this->query($sql, $data);
  }

  public function updateStatus($id, $status)
  {
    $sql = "UPDATE t_sp_header 
            SET sph_status = '$status'
            WHERE sph_number = '$id'";
    return $this->query($sql);
  }

  public function getByPeriode($prdAwal, $prdAkhir)
  {
    $sql = "SELECT * FROM t_sp_header 
            LEFT JOIN m_customer ON sph_cusId = cus_id
            WHERE sph_tanggal BETWEEN '$prdAwal' AND '$prdAkhir'";
    $query = $this->query($sql);
    return $query->getResult();
  }
}