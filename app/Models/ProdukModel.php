<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
  protected $table            = 'm_produk';
  protected $primaryKey       = 'prd_id';
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['prd_id', 'prd_nama', 'prd_aktifYN', 'prd_panjang', 'prd_lebar', 'prd_updateTime'];


  public function generateId($kode)
  {
    $sql = "SELECT prd_id FROM m_produk WHERE left(prd_jenis,1) = left('$kode',1) AND left(prd_lokal,1) = right('$kode',1) ORDER BY prd_id DESC LIMIT 1";
    $query = $this->query($sql);
    $lastId = $query->getRow();

    if(is_null($lastId)){
      return $kode . "01";
    }else{
      $kode = substr($lastId->prd_id,0,2); 
      $no = substr($lastId->prd_id,2,2); 
      $no = $no + 1;
      if($no < 10){
        return $kode . "0" . $no;
      }else{
        return $kode . $no;
      }
    }
  }

  public function getProduk($id = null)
  {
    if(!is_null($id)){
      $sql = "SELECT * FROM m_produk WHERE prd_aktifYN = 'Y' AND prd_id = '$id'";
      $query = $this->query($sql);
      return $query->getRow();
    }else{
      $sql = "SELECT * FROM m_produk WHERE prd_aktifYN = 'Y'";
      $query = $this->query($sql);
      return $query->getResult();
    }
  }

  public function addProduk($data)
  {
    $sql = "INSERT INTO m_produk (prd_id, prd_nama, prd_jenis, prd_lokal, prd_panjang, prd_lebar, prd_harga, prd_aktifYN, prd_updateTime)
            VALUES (:prd_id:, :prd_nama:, :prd_jenis:, :prd_lokal:, :prd_panjang:, :prd_lebar:, :prd_harga:, :prd_aktifYN:, :prd_updateTime:)";
    return $this->query($sql, $data);
  }

  public function updateProduk($data)
  {
    $sql = "UPDATE m_produk 
            SET prd_nama = :prd_nama:,
                prd_panjang = :prd_panjang:,
                prd_lebar = :prd_lebar:,
                prd_updateTime = :prd_updateTime:
            WHERE prd_id = :prd_id:";
    return $this->query($sql, $data);
  }

  public function deleteProduk($id)
  {
    $sql = "UPDATE m_produk 
            SET prd_aktifYN = 'N',
                prd_updateTime = :prd_updateTime:
            WHERE prd_id = :prd_id:";
    return $this->query($sql, $id);
  }
}