<?php

namespace App\Controllers;

class Home extends BaseController
{
	function __construct()
	{
		helper('url');
    $this->api = 'http://localhost:5000/api/inventory/';
		$this->client = \Config\Services::curlrequest();
	}

	public function index()
	{
		$response = $this->client->get($this->api);
		return view('layout', [
			'title' => 'Data Inventory',
      'page'  => 'content_inventory.php',
			'data'	=> json_decode($response->getBody(), true)
		]);
	}

	public function filter()
	{		
		$data = $this->request->getGet();
		$this->api .= 'filter';
		if ($data)
			$this->api .= '?&from='.$data['from'].'&to='.$data['to'];
			
		$response = $this->client->get($this->api);
		return view('layout', [
			'title' => 'Data Inventory',
      'page'  => 'content_inventory_filter.php',
			'data'	=> json_decode($response->getBody(), true)
		]);
	}

	public function test()
	{
		$response = $this->client->get('http://localhost:5000/api/product');
		
		return view('layout', [
			'title' => 'test',
			'data'	=> json_decode($response->getBody(), true)
		]);
	}
}
