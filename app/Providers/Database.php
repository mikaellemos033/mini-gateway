<?php

namespace App\Providers;

use Sect\Config\Raw;
use Sect\Database\DB;
use Sect\Providers\ServiceProvider;
use Sect\Patterns\SingleObj;

class Database implements ServiceProvider
{
	public function boot()
	{
		//
	}

	public function register(SingleObj $singleton)
	{
		$config = new Raw(BASE . '/config');

		$singleton->register('db', function() use ($config) {
			return new DB($config->fire('Database'));
		});
	}
}