<?php

namespace App\Traits;

trait Finders
{
	public function alias($alias)
	{
		$item = single('db')->select()->run($this->table)->where('alias=:alias', compact('alias'))->execute();
		if (count($item)) return $item[0];

		return null;
	}
}