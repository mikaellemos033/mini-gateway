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

	/*
	|--------------------------------------------------------------------------------
	| Helpers
	|--------------------------------------------------------------------------------
	*/

	public function createAlias($name)
	{
		$slug  = str_slug($name);
		$alias = $slug;

		$exists = true;
		$cont   = 0;

		do {

			$exists = count($this->select()->where('alias = :alias', compact('alias'))->execute());
			$alias  = $slug . ++$cont;

		} while($exists);

		return $alias;
	}
}