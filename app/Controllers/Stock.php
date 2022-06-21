<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\StockModel;

use Dompdf\Dompdf;

class Stock extends BaseController
{
  public function __construct()
  {
    $this->modelStock = new StockModel();
  }

  public function index()
  {
    $data["stock"] = $this->modelStock->getDataStock();
    return view('pages/stock/stock_list', $data);
  }

  public function printStock()
  {
    $pdf = new Dompdf();
    
    $data["stock"] = $this->modelStock->getDataStock();
    $html = view('print/stock', $data);
    // return $html;

    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    $pdf->stream('surat jalan.pdf', array(
      "Attachment" => false
    ));
  }

  public function printTransaksi()
  {
    $pdf = new Dompdf();
    
    $data["stock"] = $this->modelStock->pergerakanBarang();
    $html = view('print/pergerakan_barang', $data);

    $pdf->loadHtml($html);
    $pdf->setPaper('A4', 'portrait');
    $pdf->render();
    $pdf->stream('surat jalan.pdf', array(
      "Attachment" => false
    ));
  }

}
