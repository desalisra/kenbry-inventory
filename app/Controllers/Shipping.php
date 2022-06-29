<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;

use App\Models\StockModel;
use App\Models\PurchaseModel;
use App\Models\ShippingModel;

use Dompdf\Dompdf;

class Shipping extends BaseController
{
  public function __construct()
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID'); 
    $this->modelShipping = new ShippingModel();    
    $this->modelPurchase = new PurchaseModel();    
    $this->modelStock = new StockModel();    
  }

  public function index()
  {
    $data["shipping"] = $this->modelShipping->getHeader(); 
    return view('pages/shipping/shipping_list', $data);
  }
  
  public function detail($id)
  {
    $data["header"] = $this->modelShipping->getHeader($id); 
    $data["detail"] = $this->modelShipping->getDetail($id); 
    return view('pages/shipping/shipping_detail', $data);
  }

  public function printSuratJalan($id)
  {
    $pdf = new Dompdf();

    $data["header"] = $this->modelShipping->getHeader($id); 
    $data["detail"] = $this->modelShipping->getDetail($id);
    $html = view('print/surat_jalan', $data);

    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    $pdf->stream('invoce.pdf', array(
      "Attachment" => false
    ));
  }

  public function confirm($id)
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID');
    $invoice = "INV".substr($id,2); 

    $purchase = $this->modelPurchase->getHeader($invoice); 
    if($purchase->sph_status == "Shipping"){
      return redirect()->to(base_url('shipping'))->with('error', "Status Pesanan ini sudah pernah di Confirm");
    }

    $detail = $this->modelShipping->getDetail($id); 

    $this->modelShipping->db->transStart();

    foreach ($detail as $key => $value) {
      $data = [
        "stk_iteno" => $value->ship_iteno,
        "stk_qty" => $value->ship_qty,
        "stk_updateTime" => $datetime,
      ];

      $this->modelStock->minStock($data);
    }

    // Update Status -> Shipping
    $result = $this->modelPurchase->updateStatus($invoice, "Shipping"); 

    $this->modelShipping->db->transComplete();

    if($this->modelShipping->db->transStatus()) {
      return redirect()->to(base_url('shipping'))->with('success', 'Data Berhasil Di confirm');
    }else{
      return redirect()->to(base_url('shipping'))->with('error', $this->modelPurchase->errros());
    }
  }
}
