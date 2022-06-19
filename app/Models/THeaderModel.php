<?php

namespace App\Models;

use CodeIgniter\Model;

class THeaderModel extends Model
{
  protected $table            = 'transaksi_header';
  protected $primaryKey       = 'trnh_id';
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['trnh_id', 'trnh_refrensi', 'trnh_deskripsi', 'trnh_jenis', 'trnh_date', 'trnh_updateTime'];


  public function generateId($type = null)
  {
    if($type == "IN"){
      $sql = "SELECT trnh_id FROM transaksi_header WHERE LEFT(trnh_id,2) = 'IN' ORDER BY trnh_id DESC LIMIT 1";
      $query = $this->query($sql);
      $lastId = $query->getRow();
  
      if(is_null($lastId)){
        return "IN1001";
      }else{
        $noUrut = substr($lastId->trnh_id,2);
        $noUrut = $noUrut+1;
        $id = "IN" . $noUrut;
        return $id;
      }
    }else{
      $sql = "SELECT trnh_id FROM transaksi_header WHERE LEFT(trnh_id,2) = 'OT' ORDER BY trnh_id DESC LIMIT 1";
      $query = $this->query($sql);
      $lastId = $query->getRow();
  
      if(is_null($lastId)){
        return "OT1001";
      }else{
        $noUrut = substr($lastId->trnh_id,2);
        $noUrut = $noUrut+1;
        $id = "OT" . $noUrut;
        return $id;
      }
    }
  }

  public function getDataIn($id = null){
    if(is_null($id)){
      $sql = "SELECT * FROM transaksi_header WHERE trnh_jenis = 'IN'";
      $query = $this->query($sql);
      return $query->getResult();
    }else{
      $sql = "SELECT * FROM transaksi_header WHERE trnh_jenis = 'IN' AND trnh_id = '$id' ";
      $query = $this->query($sql);
      return $query->getRow();
    }
  }

  public function getDataOut($id = null){
    if(is_null($id)){
      $sql = "SELECT * FROM transaksi_header WHERE trnh_jenis = 'OUT'";
      $query = $this->query($sql);
      return $query->getResult();
    }else{
      $sql = "SELECT * FROM transaksi_header WHERE trnh_jenis = 'OUT' AND trnh_id = '$id' ";
      $query = $this->query($sql);
      return $query->getRow();
    }
  }

  public function inHeaderInsert($data)
  {
    $sql = "INSERT INTO transaksi_header (trnh_id, trnh_refrensi, trnh_deskripsi, trnh_jenis, trnh_date, trnh_updateTime)
            VALUES (:trnh_id:, :trnh_refrensi:, :trnh_deskripsi:, :trnh_jenis:, :trnh_date:, :trnh_updateTime:)";
    return $this->query($sql, $data);
  }
}