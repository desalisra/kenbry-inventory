<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\StockModel;

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

}
