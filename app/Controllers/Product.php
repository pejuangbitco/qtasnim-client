<?php

namespace App\Controllers;

class Product extends BaseController
{
	function __construct()
	{
    $this->api = 'http://localhost:5000/api/product/';
		$this->client = \Config\Services::curlrequest();
	}

	public function index()
	{
		return view('welcome_message');
	}

  public function create()
  {
    return view('layout', [
      'title' => 'Create Barang',
      'page'  => 'create_barang.php'
    ]);
  }

  public function save()
  {
    $response = $this->client->post($this->api);
    
  }

	public function edit($id)
	{
		$response = $this->client->get($this->api.$id);
		
		return view('layout', [
			'title' => 'test',
      'page'  => 'content.php',
			'data'	=> json_decode($response->getBody(), true)
		]);
	}
}
