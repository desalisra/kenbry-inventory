<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\CustomerModel;

class Customer extends BaseController
{
  public function __construct()
  {
    $this->modelCustomer = new CustomerModel();
  }

  public function index()
  {
    $data["customer"] = $this->modelCustomer->getCustomer();
    return view('pages/customer/customer_list', $data);
  }

  public function getCustomerById($id)
  {
    $data = $this->modelCustomer->getCustomer($id);
    return json_encode($data);
  }

  public function create()
  {
    $request = $this->request->getPost();
    $datetime = Time::now('Asia/Jakarta', 'id_ID');

    if($request['cus_id'] == ""){
      $data = [
        "cus_nama" => $request['cus_nama'],
        "cus_tlpn" => $request["cus_tlpn"],
        "cus_alamat" => $request["cus_alamat"],
        "cus_updateTime" => $datetime,
      ];

      // Insert M_Customer
      $result = $this->modelCustomer->addCustomer($data);

      if($result) {
        return redirect()->to(base_url('customer'))->with('success', 'Data Berhasil Disimpan');
      }else{
        return redirect()->to(base_url('customer'))->with('error', 'Data Gagal Disimpan');
      }
    }else{
      $data = [
        "cus_id" => $request['cus_id'],
        "cus_nama" => $request['cus_nama'],
        "cus_tlpn" => $request["cus_tlpn"],
        "cus_alamat" => $request["cus_alamat"],
        "cus_updateTime" => $datetime,
      ];
      $result = $this->modelCustomer->updateCustomer($data);
      if($result) {
        return redirect()->to(base_url('customer'))->with('success', 'Data Berhasil Diubah');
      }else{
        return redirect()->to(base_url('customer'))->with('error', 'Data Gagal Diubah');
      }
    }
  }

  public function delete($id)
  {
    $result = $this->modelCustomer->deleteCustomer($id);
    if($result) {
      return redirect()->to(base_url('customer'))->with('success', 'Data Berhasil Dihapus');
    }else{
      return redirect()->to(base_url('customer'))->with('error', 'Data Gagal Dihapus');
    }
  }

}
