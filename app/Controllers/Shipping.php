<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProdukModel;
use App\Models\StockModel;
use App\Models\CustomerModel;
use App\Models\PurchaseModel;

use Dompdf\Dompdf;

class Shipping extends BaseController
{
  public function __construct()
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID');
    $this->modelProduk = new ProdukModel();
    $this->modelStock = new StockModel(); 
    $this->modelCust = new CustomerModel();  
    $this->modelPurchase = new PurchaseModel();    
  }

  public function index()
  {
    $data["purchase"] = $this->modelPurchase->getHeaderConfirm(); 
    return view('pages/shipping/shipping_list', $data);
  }
  
  public function detail($id)
  {
    $data["header"] = $this->modelPurchase->getHeader($id); 
    $data["detail"] = $this->modelPurchase->getDetail($id); 
    return view('pages/shipping/shipping_detail', $data);
  }

  public function printSuratJalan($id)
  {
    $pdf = new Dompdf();

    $data["header"] = $this->modelPurchase->getHeader($id); 
    $data["detail"] = $this->modelPurchase->getDetail($id);
    $html = view('print/surat_jalan', $data);

    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    $pdf->stream('invoce.pdf', array(
      "Attachment" => false
    ));
  }

  public function kirim($id)
  {
    // Update Status -> Kirim
    $result = $this->modelPurchase->updateStatus($id, "Kirim"); 

    if($result) {
      return redirect()->to(base_url('shipping'))->with('success', 'Data Berhasil Disimpan');
    }else{
      return redirect()->to(base_url('shipping'))->with('error', $this->modelPurchase->errros());
    }
  }
}
