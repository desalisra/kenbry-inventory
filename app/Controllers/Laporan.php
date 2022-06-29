<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\PurchaseModel;

class Laporan extends BaseController
{
  public function __construct()
  {
    $this->modelPurchase = new PurchaseModel();    
  }

  public function index()
  {
    return view('pages/laporan/history_transaksi1');
  }

  public function search()
  {
    $request = $this->request->getGet();
    $data["purchase"] = $this->modelPurchase->getByPeriode($request["prdAwal"], $request["prdAkhir"]);
    return view('pages/laporan/history_transaksi2',$data);
  }

  public function detail($id)
  {
    $data["header"] = $this->modelPurchase->getHeader($id); 
    $data["detail"] = $this->modelPurchase->getDetail($id); 
    return view('pages/laporan/transaksi_detail', $data);
  }


}
