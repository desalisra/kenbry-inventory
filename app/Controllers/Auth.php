<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\AuthModel;

class Auth extends BaseController
{
  public function __construct()
  {
    $this->modelAuth = new AuthModel();
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
    if (!password_verify($request["password"], $user->password)){
      return redirect()->back()->with('error', 'Email Atau Password Tidak Sesuai');
    };

    $params = ['id_user' => $user->id];
    session()->set($params);

    return redirect()->to(base_url());
  }

  public function logout()
  {
    session()->remove('id_user');
    return redirect()->to(base_url('login'));
  }

  
}
