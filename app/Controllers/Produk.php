<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProdukModel;

class Produk extends BaseController
{
  public function __construct()
  {
    $this->modelProduk = new ProdukModel();
  }

  public function index()
  {
    $data["products"] = $this->modelProduk->getProduk();
    return view('pages/produk/produk_list', $data);
  }

  public function getProdukById($id)
  {
    $data = $this->modelProduk->getProduk($id);
    return json_encode($data);
  }

  public function create()
  {
    $request = $this->request->getPost();
    $datetime = Time::now('Asia/Jakarta', 'id_ID');

    if($request['prd_id'] == ""){
      $id = $this->modelProduk->generateId();

      $data = [
        "prd_id" => $id,
        "prd_nama" => $request['prd_nama'],
        "prd_panjang" => $request['prd_panjang'],
        "prd_lebar" => $request['prd_lebar'],
        "prd_aktifYN" => "Y",
        "prd_updateTime" => $datetime,
      ];

      $result = $this->modelProduk->addProduk($data);
      if($result) {
        return redirect()->to(base_url('produk'))->with('success', 'Data Berhasil Disimpan');
      }else{
        return redirect()->to(base_url('produk'))->with('error', 'Data Gagal Disimpan');
      }
    }else{
      $data = [
        "prd_id" => $request['prd_id'],
        "prd_nama" => $request['prd_nama'],
        "prd_panjang" => $request['prd_panjang'],
        "prd_lebar" => $request['prd_lebar'],
        "prd_aktifYN" => "Y",
        "prd_updateTime" => $datetime,
      ];
      $result = $this->modelProduk->updateProduk($data);
      if($result) {
        return redirect()->to(base_url('produk'))->with('success', 'Data Berhasil Diubah');
      }else{
        return redirect()->to(base_url('produk'))->with('error', 'Data Gagal Diubah');
      }
    }
  }

  public function delete($id)
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID');

    $data = [
      "prd_id" => $id,
      "prd_aktifYN" => "N",
      "prd_updateId" => "0",
      "prd_updateTime" => $datetime,
    ];
    $result = $this->modelProduk->deleteProduk($data);
    if($result) {
      return redirect()->to(base_url('produk'))->with('success', 'Data Berhasil Dihapus');
    }else{
      return redirect()->to(base_url('produk'))->with('error', 'Data Gagal Dihapus');
    }
  }

}
