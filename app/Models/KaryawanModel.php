<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
  protected $table            = 'M_Karyawan';
  protected $primaryKey       = 'kry_nip';
  protected $useSoftDeletes   = true;
  protected $returnType       = 'object';
  protected $allowedFields    = ['kry_nip', 'kry_nama', 'kry_jk', 'kry_tglLahir', 'kry_jabatan', 'kry_alamat', 'kry_tlpn', 'kry_email'];


  public function generateNip()
  {
    $y = substr(date("Y"),2,2);
    $m = date("m");

    $sql = "SELECT kry_nip FROM m_karyawan WHERE left(kry_nip,5) = left('P$y$m',5) ORDER BY kry_nip DESC LIMIT 1";
    $query = $this->query($sql);
    $lastNip = $query->getRow();

    if(is_null($lastNip)){
      return "P" . $y . $m . "01";
    }else{
      $urut = substr($lastNip->kry_nip,5,2); 
      $urut++;
      if($urut < 10){
        return "P" . $y . $m . "0" . $urut;
      }else{
        return "P" . $y . $m . $urut;
      }
    }
  }

  public function getKaryawan($nip = null)
  {
    if(!is_null($nip)){
      $sql = "SELECT * FROM m_karyawan WHERE kry_nip = '$nip'";
      $query = $this->query($sql);
      return $query->getRow();
    }else{
      $sql = "SELECT * FROM m_karyawan";
      $query = $this->query($sql);
      return $query->getResult();
    }
  }

  public function addKaryawan($data)
  {
    $sql = "INSERT INTO m_karyawan (kry_nip, kry_nama, kry_jk, kry_tglLahir, kry_jabatan, kry_alamat, kry_tlpn, kry_email)
            VALUES (:kry_nip:, :kry_nama:, :kry_jk:, :kry_tglLahir:, :kry_jabatan:, :kry_alamat:, :kry_tlpn:, :kry_email:)";
    return $this->query($sql, $data);
  }

  public function updateKaryawan($data)
  {
    $sql = "UPDATE m_karyawan 
            SET kry_nama = :kry_nama:,
                kry_jk = :kry_jk:,
                kry_tglLahir = :kry_tglLahir:,
                kry_jabatan = :kry_jabatan:,
                kry_alamat = :kry_alamat:,
                kry_tlpn = :kry_tlpn:,
                kry_email = :kry_email:
            WHERE kry_nip = :kry_nip:";
    return $this->query($sql, $data);
  }

  public function deleteKaryawan($nip)
  {
    $sql = "DELETE FROM m_karyawan WHERE kry_nip = '$nip'";
    return $this->query($sql);
  }
}