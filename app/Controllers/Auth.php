<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\AuthModel;
use App\Models\KaryawanModel;

class Auth extends BaseController
{
  public function __construct()
  {
    $this->modelAuth = new AuthModel();
    $this->modelKaryawan = new KaryawanModel();
  }

  public function index()
  {
    if(session('id_user')){
      return redirect()->to(base_url());
    }
    return view('pages/login');
  }

  public function login()
  {
    $request = $this->request->getPost();

    // Cek Exists Email
    $user = $this->modelAuth->getEmail($request["email"]);

    if (!isset($user)) {
      return redirect()->back()->with('error', 'Email Atau Password Tidak Sesuai');
    }

    // Cek Password
    if (!password_verify($request["password"], $user->mem_password)){
      return redirect()->back()->with('error', 'Email Atau Password Tidak Sesuai');
    };

    $params = [
      'id_user' => $user->mem_id,
      'nama_user' => $user->mem_nama,
      'role_user' => $user->mem_role,
    ];
    session()->set($params);

    return redirect()->to(base_url());
  }

  public function logout()
  {
    session()->remove('id_user');
    return redirect()->to(base_url('login'));
  }

  public function adminForm()
  {
    $data["karyawan"] = $this->modelKaryawan->getKaryawan();
    $data["member"] = $this->modelAuth->getAkun();
    return view('pages/administrator', $data);
  }

  public function addAccount()
  {
    $request = $this->request->getPost();
    $karyawan = $this->modelKaryawan->getKaryawan($request["karyawan"]);
    $password = $this->generatePassword($karyawan->kry_tglLahir);
    $password_encrypt = password_hash($password, PASSWORD_DEFAULT);

    $data = [
      "mem_nip" => $karyawan->kry_nip,
      "mem_nama" => $karyawan->kry_nama,
      "mem_email" => $karyawan->kry_email,
      "mem_password" => $password_encrypt,
      "mem_role" => $request["role"],
    ];

    $result = $this->modelAuth->addAkun($data);
    if($result) {
      return redirect()->to(base_url('administrator'))->with('success', 'Data Berhasil Disimpan');
    }else{
      return redirect()->to(base_url('administrator'))->with('error', 'Data Gagal Disimpan');
    }
  }

  private function generatePassword($tanggal)
  {
    $y = substr($tanggal,2,2);
    $m = substr($tanggal,5,2);
    $d = substr($tanggal,8,2);

    return $d.$m.$y;
  }

  public function deleteAccount($id)
  {
    $result = $this->modelAuth->deleteAkun($id);
    if($result) {
      return redirect()->to(base_url('administrator'))->with('success', 'Data Berhasil Dihapus');
    }else{
      return redirect()->to(base_url('administrator'))->with('error', 'Data Gagal Dihapus');
    }
  }
  
}
