<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
  protected $table            = 'users';
  protected $primaryKey       = 'id';
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['id', 'nama', 'email', 'password'];


  public function getEmail($email)
  {
    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $query = $this->query($sql);
    return $query->getRow();
  }

}