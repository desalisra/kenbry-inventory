<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProdukModel;

class Transaksi extends BaseController
{
  public function __construct()
  {
    $this->modelProduk = new ProdukModel();
  }

//   public function index()
//   {
//     $data["products"] = $this->modelProduk->getProduk();
//     return view('pages/produk/produk_list', $data);
//   }

  public function listTransIn()
  {
    return view('pages/transaksi/tnin_list');
  }

  public function formAdd()
  {
    $data["products"] = $this->modelProduk->getProduk();
    return view('pages/transaksi/tnin_add', $data);
  }

  public function prosesAdd()
  {
    $request = $this->request->getPost();
    dd($request);
    return view('pages/transaksi/tnin_add', $data);
  }
  
  


}
