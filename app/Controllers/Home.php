<?php

namespace App\Controllers;

class Home extends BaseController
{
	function __construct()
	{
		$this->client = \Config\Services::curlrequest();
	}

	public function index()
	{
		return view('welcome_message');
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
