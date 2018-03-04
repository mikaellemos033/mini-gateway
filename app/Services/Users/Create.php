<?php

namespace App\Services\Users;

use Exception;
use App\User;
use App\Services\BaseService;

class Create extends BaseService
{
	public function boot(array $params = [])
	{
		$repositorie        = new User();
		$params['password'] = md5($params['password']);

		try {

			$user = $repositorie->create($params);
			return $this->success('Usuário cadastrado.', $user);

		} catch (Exception $e) {
			return $this->error($e->getMessage());
		}
	}

	public function rules()
	{
		'name',
		'document',
		'email',
		'password'
	}
}