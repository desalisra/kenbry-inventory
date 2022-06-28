<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProdukModel;
use App\Models\StockModel;
use App\Models\ReceivingModel;

class Receiving extends BaseController
{
  public function __construct()
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID');
    $this->modelProduk = new ProdukModel();
    $this->modelStock = new StockModel();    
    $this->modelReceiving = new ReceivingModel();
  }

  public function index()
  {
    $data["receiving"] = $this->modelReceiving->getHeader(); 
    return view('pages/receiving/receiving_list', $data);
  }
  
  public function detail($id)
  {
    $data["header"] = $this->modelReceiving->getHeader($id); 
    $data["detail"] = $this->modelReceiving->getDetail($id); 
    return view('pages/receiving/receiving_detail', $data);
  }
  
  public function formAdd()
  {
    $data["products"] = $this->modelProduk->getProduk();
    return view('pages/receiving/receiving_add', $data);
  }

  public function prosesAdd()
  {
    $request = $this->request->getPost();
    $datetime = Time::now('Asia/Jakarta', 'id_ID');
    $id = $this->modelReceiving->generateId(); 

    $this->modelReceiving->db->transStart();
    
    $header = [
      "recv_number" => $id,
      "recv_tanggal" => $request["recv_tanggal"], 
      "recv_deskripsi" => $request["recv_deskripsi"], 
      "recv_updateId" => "0000",
      "recv_updateTime" => $datetime
    ];

    // Insert Header
    $result = $this->modelReceiving->insertHeader($header); 

    for($i = 0; $i < count($request["produk"]); $i++){
      $detail = [
        "recv_number" => $id,
        "recv_iteno" => $request["produk"][$i],
        "recv_qty" => $request["qty"][$i],
        "recv_keterangan" => $request["ket"][$i],
      ];

      // Insert Detail
      $this->modelReceiving->insertDetail($detail);

      $stock = [
        "stk_iteno" => $request["produk"][$i],
        "stk_qty" => $request["qty"][$i],
        "stk_updateTime" => $datetime
      ];

      // Update Stock Produk
      $this->modelStock->updateStock($stock);
    }

    $this->modelReceiving->db->transComplete();

    if($this->modelReceiving->db->transStatus()) {
      return redirect()->to(base_url('receiving'))->with('success', 'Data Berhasil Disimpan');
    }else{
      return redirect()->to(base_url('receiving'))->with('error', $this->modelReceiving->errros());
    }
  }
  
  


}
