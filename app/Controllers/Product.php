<?php

namespace App\Controllers;

class Product extends BaseController
{
  public function __construct()
  {
    helper('url');
    $this->api = 'http://localhost:5000/api/product/';
    $this->client = \Config\Services::curlrequest();
  }

  public function index()
	{
		$response = $this->client->get($this->api);
		
		return view('layout', [
			'title' => 'Data Barang',
      'page'  => 'content.php',
			'data'	=> json_decode($response->getBody(), true)
		]);
	}

  public function create()
  {
    return view('layout', [
      'title' => 'Create Barang',
      'page'  => 'create_barang.php'
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
      "name": "' . $data['name'] . '",
      "stock": ' . $data['stock'] . ',
      "productType": "' . $data['productType'] . '"      
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
    return redirect()->to(base_url('Product')); 
  }

  public function edit($id)
  {
    $response = $this->client->get($this->api . $id);
    
    return view('layout', [
      'title' => 'Edit data barang',
      'page'  => 'edit_barang.php',
      'data'  => json_decode($response->getBody(), true)
    ]);
  }

  public function delete($id)
  {
    $this->client->delete($this->api . $id);
    return redirect()->to(base_url('Product')); 
  }

}
