<?php

namespace App\Http\Controllers;

class Home
{
	public function index()
	{
		return single('json')->response([
			'success' => true,
			'message' => 'Api Conectada'
		]);
	}
}