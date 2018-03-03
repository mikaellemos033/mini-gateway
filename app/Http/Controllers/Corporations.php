<?php 

namespace App\Http\Controllers;

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
}