<?php

namespace App\Controllers;

class Transaction extends BaseController
{
  public function __construct()
  {
    helper('url');
    $this->api = 'http://localhost:5000/api/transaction/';
    $this->client = \Config\Services::curlrequest();
  }

  public function index()
	{
		$response = $this->client->get($this->api);
		
		return view('layout', [
			'title' => 'Data Transaksi',
      'page'  => 'content_transaksi.php',
			'data'	=> json_decode($response->getBody(), true)
		]);
	}

  public function create()
  {
    $response = $this->client->get('http://localhost:5000/api/product/');
    return view('layout', [
      'title' => 'Create Transaksi',
      'page'  => 'create_transaksi.php',
      'data'	=> json_decode($response->getBody(), true)
    ]);
  }

  public function save($id = null)
  {
    $method = 'POST';
    if($id != null) {
      $method = 'PUT';
      $this->api .= $id;
    }
    
    $data = $this->request->getPost();
    
    $body = '{
      "quantity": ' . $data['quantity'] . ',
      "tanggal": "'. $data['tanggal'] .'",
      "productId": ' . $data['productId'] . '      
    }';

    $this->client->setBody($body);
    
    $this->client->request($method, $this->api, [
      'headers' => [
        'Accept'     => '*/*',
        'Content-Type' => 'application/json'
      ],
      'connect_timeout' => 0,
      'http_errors' => false,
    ]);
    
    return redirect()->to(base_url('Transaction')); 
  }

  public function edit($id)
  {
    $response = $this->client->get($this->api . $id);
    $data = json_decode($response->getBody(), true);
    $date=date_create($data['tanggal']);
    $data['tanggal'] = date_format($date,"Y-m-d");
    
    $barang_response = $this->client->get('http://localhost:5000/api/product/');
    return view('layout', [
      'title' => 'Edit data transaksi',
      'page'  => 'edit_transaksi.php',
      'data'  => $data,
      'data_barang' => json_decode($barang_response->getBody(), true),
    ]);
  }

  public function delete($id)
  {
    $this->client->delete($this->api . $id);
    return redirect()->to(base_url('Transaction')); 
  }

}
