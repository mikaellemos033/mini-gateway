<?php

namespace App;

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
}