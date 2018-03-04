<?php

namespace App\Services;

use App\Corporation as Model;

class Corporation extends BaseService
{
	public function boot(array $params = [])
	{
		$repositorie = new Model();	

		return $repositorie->create([
			'name'  => $params['name'],
			'alias' => $repositorie->createAlias($params['name'])
		]);
	}

	public function rules()
	{
		return [
			'name',
		];
	}
}