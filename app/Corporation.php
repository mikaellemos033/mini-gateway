<?php

namespace App;

use App\Traits\SoftDelete;

class Corporation extends Model
{
	protected $table = 'corporations';
	protected $fillable = [
		'name',
		'alias',
		'created_at',
		'updated_at'		
	];

	use SoftDelete;
}