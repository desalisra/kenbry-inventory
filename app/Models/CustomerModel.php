<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
  protected $table            = 'M_Customer';
  protected $primaryKey       = 'cus_id';
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['cus_id', 'cus_nama', 'cus_tlpn', 'cus_alamat', 'cus_updateId', 'cus_updateTime'];

  public function getCustomer($id = null)
  {
    if(!is_null($id)){
      $sql = "SELECT * FROM m_customer WHERE cus_id = $id";
      $query = $this->query($sql);
      return $query->getRow();
    }else{
      $sql = "SELECT * FROM m_customer";
      $query = $this->query($sql);
      return $query->getResult();
    }
  }

  public function addCustomer($data)
  {
    $sql = "INSERT INTO m_customer (cus_nama, cus_tlpn, cus_alamat, cus_updateTime)
            VALUES (:cus_nama:, :cus_tlpn:, :cus_alamat:, :cus_updateTime:)";
    return $this->query($sql, $data);
  }

  public function updateCustomer($data)
  {
   
    $sql = "UPDATE m_customer 
            SET cus_nama = :cus_nama:,
                cus_tlpn = :cus_tlpn:,
                cus_alamat = :cus_alamat:,
                cus_updateTime = :cus_updateTime:
            WHERE cus_id = :cus_id:";
    return $this->query($sql, $data);
  }

  public function deleteCustomer($id)
  {
    $sql = "DELETE FROM m_customer WHERE cus_id = $id";
    return $this->query($sql);
  }
}