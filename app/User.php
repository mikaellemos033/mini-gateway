<?php

namespace App;

use Exception;
use App\Traits\SoftDelete;

class User extends Model
{
	protected $table = 'users';
	protected $fillable = [
		'name',
		'document',
		'email',
		'password',
		'created_at',
		'updated_at',
	];

	use SoftDelete;

	/*
	|--------------------------------------------------------------------------------
	| Helpers
	|--------------------------------------------------------------------------------
	*/

	public function create(array $params)
	{
		$validate = $this->select()
			 	         ->where('document = :document or email = :email', ['email' => $params['email'], 'document' => $params['document']])
			 			 ->execute();

		if (count($validate)) throw new Exception('E-mail ou documento ja estão em uso', 1);
		return parent::create($params);
	}
}