<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
  protected $table            = 'tb_product';
  protected $primaryKey       = 'prd_id';
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['prd_id', 'prd_name', 'prd_aktifYN', 'prd_updateId','prd_updateTime'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'prd_updateTime';
  protected $updatedField  = 'prd_updateTime';

  public function generateId()
  {
    $sql = "SELECT prd_id FROM tb_product ORDER BY prd_id DESC LIMIT 1";
    $query = $this->query($sql);
    $lastId = $query->getRow();

    if(is_null($lastId)){
      return "1001";
    }else{
      return $lastId->prd_id + 1;
    }
  }

  public function getProduct($id = null)
  {
    $sql = "SELECT * FROM tb_product WHERE prd_aktifYN = 'Y'";
    $query = $this->query($sql);
    return $query->getResult();
  }
}