<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProdukModel;
use App\Models\StockModel;

class Produk extends BaseController
{
  public function __construct()
  {
    $this->modelProduk = new ProdukModel();
    $this->modelStock = new StockModel();
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
      $kode = substr($request["prd_jenis"],0,1);
      $kode = $kode . substr($request["prd_lokal"],0,1);
      $id = $this->modelProduk->generateId($kode);
      
      $data = [
        "prd_id" => $id,
        "prd_nama" => $request['prd_nama'],
        "prd_jenis" => $request["prd_jenis"],
        "prd_lokal" => $request["prd_lokal"],
        "prd_panjang" => $request['prd_panjang'],
        "prd_lebar" => $request['prd_lebar'],
        "prd_harga" => $request['prd_harga'],
        "prd_aktifYN" => "Y",
        "prd_updateTime" => $datetime,
      ];

      // Insert M_Produk
      $result = $this->modelProduk->addProduk($data);
      
      // Insert T_Stock
      $data = [
        "stk_iteno" => $id,
        "stk_qty" => 0,
        "stk_updateTime" => $datetime,
      ];
      $result = $this->modelStock->insertStock($data);

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
