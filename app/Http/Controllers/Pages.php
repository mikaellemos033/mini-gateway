<?php

namespace App\Http\Controllers;

class Pages
{
	public function index()
	{
		return single('json')->response([
			'success' => true,
			'message' => 'Api Conectada'
		]);
	}
}