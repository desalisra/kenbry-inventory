<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
  protected $table            = 'm_member';
  protected $primaryKey       = 'id';
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['mem_id', 'mem_nip', 'mem_nama', 'mem_email', 'mem_password', 'mem_role'];


  public function getEmail($email)
  {
    $sql = "SELECT * FROM m_member WHERE mem_email = '$email' LIMIT 1";
    $query = $this->query($sql);
    return $query->getRow();
  }

  public function getAkun()
  {
    $sql = "SELECT * FROM m_member";
    $query = $this->query($sql);
    return $query->getResult();
  }

  public function addAkun($data)
  {
    $sql = "INSERT INTO m_member (mem_nip, mem_nama, mem_email, mem_password, mem_role)
            VALUES (:mem_nip:, :mem_nama:, :mem_email:, :mem_password:, :mem_role:)";
    return $this->query($sql, $data);
  }

  public function deleteAkun($id)
  {
    $sql = "DELETE FROM m_member WHERE mem_id = $id";
    return $this->query($sql);
  }

}