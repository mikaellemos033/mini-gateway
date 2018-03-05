<?php

namespace App\Services\Users;

use Exception;
use App\User;
use App\Services\BaseService;

class Create extends BaseService
{
	public function boot(array $params = [])
	{

		try {

			$repositorie = new User();		
			$user        = $repositorie->create($params);
			return $this->success('Usuário cadastrado.', $user);

		} catch (Exception $e) {
			return $this->error($e->getMessage());
		}
	}

	public function rules()
	{
		return [
			'name',
			'document',
			'email'
		];
	}
}