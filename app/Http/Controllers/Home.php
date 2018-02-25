<?php

class Home
{
	public function index()
	{
		return json_encode([
			'success' => true,
			'message' => 'Api Conectada'
		]);
	}
}