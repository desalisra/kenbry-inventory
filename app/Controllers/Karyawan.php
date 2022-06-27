<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
  public function __construct()
  {
    $this->modelKaryawan = new KaryawanModel();
  }

  public function index()
  {
    $data["karyawan"] = $this->modelKaryawan->getKaryawan();
    return view('pages/karyawan/karyawan_list', $data);
  }

  public function getKaryawanByNip($nip)
  {
    $data = $this->modelKaryawan->getKaryawan($nip);
    return json_encode($data);
  }

  public function create()
  {
    $request = $this->request->getPost();
    $datetime = Time::now('Asia/Jakarta', 'id_ID');

    if($request['kry_nip'] == ""){
      $nip = $this->modelKaryawan->generateNip();
      $data = [
        "kry_nip" => $nip,
        "kry_nama" => $request['kry_nama'],
        "kry_jk" => $request["kry_jk"],
        "kry_tglLahir" => $request["kry_tglLahir"],
        "kry_jabatan" => $request['kry_jabatan'],
        "kry_alamat" => $request['kry_alamat'],
        "kry_tlpn" => $request['kry_tlpn'],
        "kry_email" => $request['kry_email'],
      ];

      // Insert M_karyawan
      $result = $this->modelKaryawan->addKaryawan($data);

      if($result) {
        return redirect()->to(base_url('karyawan'))->with('success', 'Data Berhasil Disimpan');
      }else{
        return redirect()->to(base_url('karyawan'))->with('error', 'Data Gagal Disimpan');
      }
    }else{
      $data = [
        "kry_nip" => $request['kry_nip'],
        "kry_nama" => $request['kry_nama'],
        "kry_jk" => $request["kry_jk"],
        "kry_tglLahir" => $request["kry_tglLahir"],
        "kry_jabatan" => $request['kry_jabatan'],
        "kry_alamat" => $request['kry_alamat'],
        "kry_tlpn" => $request['kry_tlpn'],
        "kry_email" => $request['kry_email'],
      ];
      $result = $this->modelKaryawan->updateKaryawan($data);
      if($result) {
        return redirect()->to(base_url('karyawan'))->with('success', 'Data Berhasil Diubah');
      }else{
        return redirect()->to(base_url('karyawan'))->with('error', 'Data Gagal Diubah');
      }
    }
  }

  public function delete($nip)
  {
    $result = $this->modelKaryawan->deleteKaryawan($nip);
    if($result) {
      return redirect()->to(base_url('produk'))->with('success', 'Data Berhasil Dihapus');
    }else{
      return redirect()->to(base_url('produk'))->with('error', 'Data Gagal Dihapus');
    }
  }

}
