<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProductModel;

class Stock extends BaseController
{
  public function __construct()
  {
    $this->modelProduct = new ProductModel();
  }

  public function index()
  {
    // $data["products"] = $this->modelProduct->getProduct();
    // return view('pages/product/product', $data);
  }

  public function stockIn()
  {

    return view('pages/stock/stockin');
  }

  public function store()
  {
    $data['products'] = $this->modelProduct->getProduct();
    return view('pages/stock/stockin_add', $data);
  }

  public function create()
  {
    $request = $this->request->getPost();

    dd($request);
  }

}
