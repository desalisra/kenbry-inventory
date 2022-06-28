<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProdukModel;
use App\Models\StockModel;
use App\Models\CustomerModel;
use App\Models\PurchaseModel;

use App\Models\ReceivingModel;

class Purchase extends BaseController
{
  public function __construct()
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID');
    $this->modelProduk = new ProdukModel();
    $this->modelStock = new StockModel(); 
    $this->modelCust = new CustomerModel();  
    $this->modelPurchase = new PurchaseModel();    
    $this->modelReceiving = new ReceivingModel();
  }

  public function index()
  {
    $data["products"] = $this->modelProduk->getProduk();
    $data["customer"] = $this->modelCust->getCustomer();
    $data["receiving"] = $this->modelReceiving->getHeader(); 
    return view('pages/purchase/purchase', $data);
  }
  
  public function detail($id)
  {
    $data["header"] = $this->modelReceiving->getHeader($id); 
    $data["detail"] = $this->modelReceiving->getDetail($id); 
    return view('pages/receiving/receiving_detail', $data);
  }

  public function prosesPesanan()
  {
    $request = $this->request->getPost();
    $id = $this->modelPurchase->generateId(); 
    $datetime = Time::now('Asia/Jakarta', 'id_ID');
    $total = 0;

    $this->modelPurchase->db->transStart();

    for($i = 0; $i < count($request["recv_iteno"]); $i++){
      if($request["recv_iteno"][$i] != ""){
        // get Harga produk
        $harga = $this->modelProduk->getProduk($request["recv_iteno"][$i]);
        $harga = $harga * $request["spd_qty"][$i];

        $detail = [
          "spd_number" => $id,
          "spd_iteno" => $request["spd_iteno"][$i],
          "spd_qty" => $request["spd_qty"][$i],
          "spd_harga" => $harga,
          "spd_keterangan" => $request["spd_keterangan"][$i],
        ];
  
        // Insert Detail
        $this->modelPurchase->insertDetail($detail);
        
        // Potong Stock
        $stock = [
          "stk_iteno" => $request["recv_iteno"][$i],
          "stk_qty" => $request["recv_qty"][$i],
          "stk_updateTime" => $datetime
        ];
  
        // Update Stock Produk
        $this->modelStock->minStock($stock);

        $total = $total + $harga;
      }
    }

    $header = [
      "sph_number" => $id,
      "sph_cusId" => $request["sph_cusId"], 
      "sph_tanggal" => $request["sph_tanggal"], 
      "sph_deskripsi" => $request["sph_deskripsi"], 
      "sph_total" => $total, 
      "sph_status" => "Pesanan", 
      "sph_updateId" => "0000",
      "sph_updateTime" => $datetime
    ];

    // Insert Header
    $result = $this->modelPurchase->insertHeader($header); 

    $this->modelPurchase->db->transComplete();

    if($this->modelPurchase->db->transStatus()) {
      return redirect()->to(base_url('receiving'))->with('success', 'Data Berhasil Disimpan');
    }else{
      return redirect()->to(base_url('receiving'))->with('error', $this->modelPurchase->errros());
    }
  }
  
}
