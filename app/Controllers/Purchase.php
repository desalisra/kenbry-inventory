<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProdukModel;
use App\Models\StockModel;
use App\Models\CustomerModel;
use App\Models\PurchaseModel;
use App\Models\ShippingModel;

use Dompdf\Dompdf;

class Purchase extends BaseController
{
  public function __construct()
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID');
    $this->modelProduk = new ProdukModel();
    $this->modelStock = new StockModel(); 
    $this->modelCust = new CustomerModel();  
    $this->modelPurchase = new PurchaseModel(); 
    $this->modelShipping = new ShippingModel();  
  }

  public function index()
  {
    $data["products"] = $this->modelProduk->getProduk();
    $data["customer"] = $this->modelCust->getCustomer();
    $data["purchase"] = $this->modelPurchase->getHeaderCurrent(); 
    return view('pages/purchase/purchase', $data);
  }
  
  public function detail($id)
  {
    $data["header"] = $this->modelPurchase->getHeader($id); 
    $data["detail"] = $this->modelPurchase->getDetail($id); 
    return view('pages/purchase/purchase_detail', $data);
  }

  public function prosesPesanan()
  {
    $request = $this->request->getPost();
    $id = $this->modelPurchase->generateId(); 
    $datetime = Time::now('Asia/Jakarta', 'id_ID');
    $total = 0;

    // Check Stock Produk Cukup
    for($i = 0; $i < count($request["produk"]); $i++){
      $qtyStock = $this->modelStock->cekStock($request["produk"][$i], $request["qty"][$i]);
      if($qtyStock->qty < 0){
        return redirect()->to(base_url('purchase'))->with('error', "Qty produk" . $request['produk'][$i] . " melibihi stock yang ada");
      }
    }

    $this->modelPurchase->db->transStart();

    for($i = 0; $i < count($request["produk"]); $i++){
      if($request["produk"][$i] != ""){
        // get Harga produk
        $harga = $this->modelProduk->getProduk($request["produk"][$i]);
        $harga = (float)$harga->prd_harga * (float)$request["qty"][$i];

        $detail = [
          "spd_number" => $id,
          "spd_iteno" => $request["produk"][$i],
          "spd_qty" => $request["qty"][$i],
          "spd_harga" => $harga,
          "spd_keterangan" => $request["ket"][$i],
        ];
  
        // Insert Detail
        $this->modelPurchase->insertDetail($detail);

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
      return redirect()->to(base_url('purchase'))->with('success', 'Data Berhasil Disimpan');
    }else{
      return redirect()->to(base_url('purchase'))->with('error', $this->modelPurchase->errros());
    }
  }

  public function print($id)
  {
    $pdf = new Dompdf();

    $data["header"] = $this->modelPurchase->getHeader($id); 
    $data["detail"] = $this->modelPurchase->getDetail($id);
    $html = view('pages/purchase/invoice_print', $data);

    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    $pdf->stream('invoce.pdf', array(
      "Attachment" => false
    ));
  }
  
  public function confirmPesanan($id)
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID');

    $this->modelPurchase->db->transStart();

    // Update Status -> Confirm
    $result = $this->modelPurchase->updateStatus($id, "Confirm"); 
    $header = $this->modelPurchase->getHeader($id); 
    $detail = $this->modelPurchase->getDetail($id); 

    $data = [
      "ship_number" => "DO" . substr($header->sph_number,3),
      "ship_cusId" => $header->sph_cusId,
      "ship_tanggal" => $header->sph_tanggal,
      "ship_deskripsi" => $header->sph_deskripsi,
      "ship_updateId" => "0000",
      "ship_updateTime" => $datetime,
    ];

    $this->modelShipping->insertHeader($data);

    foreach ($detail as $key => $value) {
      $data = [
        "ship_number" => "DO" . substr($value->spd_number,3),
        "ship_iteno" => $value->spd_iteno,
        "ship_qty" => $value->spd_qty,
        "ship_keterangan" => $value->spd_keterangan,
      ];

      $this->modelShipping->insertDetail($data);
    }

    $this->modelPurchase->db->transComplete();

    if($this->modelPurchase->db->transStatus()) {
      return redirect()->to(base_url('purchase'))->with('success', 'Data Berhasil Disimpan');
    }else{
      return redirect()->to(base_url('purchase'))->with('error', $this->modelPurchase->errros());
    }
  }
}
