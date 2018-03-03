<?php

namespace App\Traits;

trait Finders
{
	public function alias($alias)
	{
		return single('db')->select()->run($this->table)->where('alias=:alias', compact('alias'))->execute();
	}
}