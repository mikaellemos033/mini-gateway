<?php 

namespace App\Services\Users;

use App\User;
use App\Services\BaseService;

class Search extends BaseService
{
	public function boot(array $params = [])
	{
		$repositorie = new User();
		$user        = $repositorie->select()->where('document = :document and email = :email', ['email' => $params['email'], 'document' => $params['document']])->execute();

		if (is_array($user)) return $this->success('Usuário encontrado.', $user[0]);
		
		$service = new Create();
		return $service->handle($params);
	}

	public function rules()
	{
		'name',
		'document',
		'email'
	}
}