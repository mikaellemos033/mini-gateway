<?php 

namespace App\Http\Controllers;

use App\Services\Corporation as Service;
use App\Corporation;

class Corporations
{
	public function index()
	{
		$corporations = (new Corporation())->all();
		$items        = [];

		foreach ($corporations as $corporation) {
			$items[]['alias'] = $corporation->alias;
			$items[]['name']  = $corporation->name;
		}
		
		return single('json')->response([
			'success' => true,
			'message' => 'Corporações listadas com sucesso',
			'data'    => ['corporations' => $items]
		]);
	}

	public function create()
	{
		$name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
		$corporation = new Service();
		
		if (!$name) {
			return single('json')->response([
				'success' => false,
				'message' => 'Parâmetros inválidos.'
			], 406);
		}

		$response = $corporation->handle(compact('name'));
		
		if ($response) {
		
			return single('json')->response([
				'success' => true,
				'message' => 'Corporação criada com sucesso',
				'data'    => $response->content
			]);

		}

		return single('json')->response([
			'success' => false,
			'message' => 'Houve um problema no seu cadastro.'
		], 406);
	}
}