<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProdukModel;
use App\Models\THeaderModel;
use App\Models\TDetailModel;
use App\Models\StockModel;

use Dompdf\Dompdf;
use Mpdf\Mpdf;

class TransaksiOut extends BaseController
{
  public function __construct()
  {

    $this->modelProduk = new ProdukModel();
    $this->modelHeader = new THeaderModel();
    $this->modelDetail = new TDetailModel();
    $this->modelStock = new StockModel();
  }

  public function listTransOut()
  {
    $data["produkOut"] = $this->modelHeader->getDataOut(); 
    return view('pages/transaksi/tnout_list', $data);
  }
  
  public function detailTransOut($id)
  {
    $data["header"] = $this->modelHeader->getDataOut($id); 
    $data["detail"] = $this->modelDetail->getDetail($id); 
    return view('pages/transaksi/tnout_detail', $data);
  }
  
  public function formAdd()
  {
    $data["products"] = $this->modelProduk->getProduk();
    return view('pages/transaksi/tnout_add', $data);
  }

  public function prosesAdd()
  {

    $request = $this->request->getPost();
    $id = $this->modelHeader->generateId("OUT"); 
    $datetime = Time::now('Asia/Jakarta', 'id_ID');


    // Check Stock Produk >= Stock Dikeluar
    for($i = 0; $i < count($request["produk"]); $i++){
      $produk = $request["produk"][$i];
      $qty = $request["qty"][$i];
      $sisa = $this->modelStock->cekStock($produk, $qty);

      if($sisa->qty < 0){
        return redirect()->back()->with('error', "Qty produk " . $produk . " tidak mencukupi");
      }
    }

    $this->modelHeader->db->transStart();
    
    $data = [
      "trnh_id" => $id,
      "trnh_refrensi" => $request["noref"], 
      "trnh_deskripsi" => $request["deskripsi"], 
      "trnh_jenis" => "OUT", 
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

      // Potong Stock Produk
      $this->modelStock->minStock($data);
    }

    $this->modelHeader->db->transComplete();

    if($this->modelHeader->db->transStatus()) {
      return redirect()->to(base_url('transaksi-out'))->with('success', 'Data Berhasil Disimpan');
    }else{
      return redirect()->to(base_url('transaksi-out'))->with('error', $this->modelHeader->errros());
    }
  }

  public function printSuratJalan(){
    $pdf = new Dompdf();
    
    $data["header"] = $this->modelHeader->getDataOut("OT1002"); 
    $data["detail"] = $this->modelDetail->getDetail("OT1002"); 
    $html = view('pages/print/surat_jalan',$data);

    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    $pdf->stream('surat jalan.pdf', array(
      "Attachment" => false
    ));

  }
  
  


}
