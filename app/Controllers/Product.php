<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\ProductModel;

class Product extends BaseController
{
  public function __construct()
  {
    $this->modelProduct = new ProductModel();
  }

  public function index()
  {
    $data["products"] = $this->modelProduct->getProduct();
    return view('pages/product/product', $data);
  }

  public function store()
  {
    return view('pages/product/product_add');
  }

  public function edit($id)
  {
    // $data["product"] = $this->modelProduct->getProduct($id);
    // return view('pages/product/product_edit', $data);

    $data = $this->modelProduct->getProduct($id);
    return json_encode($data);
  }

  public function create()
  {
    $request = $this->request->getPost();
    $datetime = Time::now('Asia/Jakarta', 'id_ID');

    if($request['product_id'] == ""){
      $id = $this->modelProduct->generateId();

      $data = [
        "prd_id" => $id,
        "prd_name" => $request['product_name'],
        "prd_aktifYN" => "Y",
        "prd_updateId" => "0",
        "prd_updateTime" => $datetime,
      ];

      $result = $this->modelProduct->addProduct($data);
      if($result) {
        return redirect()->to(base_url('product'))->with('success', 'Data Berhasil Disimpan');
      }else{
        return redirect()->to(base_url('product'))->with('error', 'Data Gagal Disimpan');
      }
    }else{
      $data = [
        "prd_id" => $request['product_id'],
        "prd_name" => $request['product_name'],
        "prd_aktifYN" => "Y",
        "prd_updateId" => "0",
        "prd_updateTime" => $datetime,
      ];
      $result = $this->modelProduct->updateProduct($data);
      if($result) {
        return redirect()->to(base_url('product'))->with('success', 'Data Berhasil Diubah');
      }else{
        return redirect()->to(base_url('product'))->with('error', 'Data Gagal Diubah');
      }
    }
  }

  public function delete($id)
  {
    $datetime = Time::now('Asia/Jakarta', 'id_ID');

    $data = [
      "prd_id" => $id,
      "prd_aktifYN" => "N",
      "prd_updateId" => "0",
      "prd_updateTime" => $datetime,
    ];
    $result = $this->modelProduct->deleteProduct($data);
    if($result) {
      return redirect()->to(base_url('product'))->with('success', 'Data Berhasil Dihapus');
    }else{
      return redirect()->to(base_url('product'))->with('error', 'Data Gagal Dihapus');
    }
  }

}
