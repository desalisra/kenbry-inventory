<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProdukModel;
use App\Models\THeaderModel;
use App\Models\TDetailModel;
use App\Models\StockModel;

class TransaksiIn extends BaseController
{
  public function __construct()
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID');
    $this->modelProduk = new ProdukModel();
    $this->modelHeader = new THeaderModel();
    $this->modelDetail = new TDetailModel();
    $this->modelStock = new StockModel();
  }

  public function listTransIn()
  {
    $data["produkIn"] = $this->modelHeader->getDataIn(); 
    return view('pages/transaksi/tnin_list', $data);
  }
  
  public function detailTransIn($id)
  {
    $data["header"] = $this->modelHeader->getDataIn($id); 
    $data["detail"] = $this->modelDetail->getDetail($id); 
    return view('pages/transaksi/tnin_detail', $data);
  }
  
  public function formAdd()
  {
    $data["products"] = $this->modelProduk->getProduk();
    return view('pages/transaksi/tnin_add', $data);
  }

  public function prosesAdd()
  {
    $request = $this->request->getPost();
    $id = $this->modelHeader->generateId("IN"); 
    $datetime = Time::now('Asia/Jakarta', 'id_ID');

    $this->modelHeader->db->transStart();
    
    $data = [
      "trnh_id" => $id,
      "trnh_refrensi" => $request["noref"], 
      "trnh_deskripsi" => $request["deskripsi"], 
      "trnh_jenis" => "IN", 
      "trnh_date" => $request["tanggal"], 
      "trnh_updateTime" => $datetime
    ];

    // Insert Header
    $result = $this->modelHeader->inHeaderInsert($data); 

    for($i = 0; $i < count($request["produk"]); $i++){
      $data = [
        "trnd_id" => $id,
        "trnd_produkId" => $request["produk"][$i],
        "trnd_qty" => $request["qty"][$i],
        "trnd_ket" => $request["ket"][$i],
        "trnd_updateTime" => $datetime
      ];

      // Insert Detail
      $this->modelDetail->inDetailInsert($data);

      $data = [
        "stock_produk" => $request["produk"][$i],
        "stock_qty" => $request["qty"][$i],
        "stock_updateTime" => $datetime
      ];

      // Update Stock Produk
      $this->modelStock->updateStock($data);
    }

    $this->modelHeader->db->transComplete();

    if($this->modelHeader->db->transStatus()) {
      return redirect()->to(base_url('transaksi-in'))->with('success', 'Data Berhasil Disimpan');
    }else{
      return redirect()->to(base_url('transaksi-in'))->with('error', $this->modelHeader->errros());
    }
  }
  
  


}
