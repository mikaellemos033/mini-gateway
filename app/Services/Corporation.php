<?php

namespace App\Services;

use App\Corporation as Model;

class Corporation extends BaseService
{
	public function boot(array $params = [])
	{
		$repositorie = new Model();	
		$corporation  =  $repositorie->create([
			'name'  => $params['name'],
			'alias' => $repositorie->createAlias($params['name'])
		]);

		if ($corporation) return $this->success('Corporação criada com sucesso.', $corporation);
		return $this->error('Houve um problema no cadastro da corporação');
	}

	public function rules()
	{
		return [
			'name',
		];
	}
}