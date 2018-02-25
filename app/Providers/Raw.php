<?php

namespace App\Provider;

use Sect\Config\Raw;
use Sect\Providers\ServiceProvider;
use Sect\Patterns\SingleObj;

class Raw implements ServiceProvider
{
	public function boot()
	{
		//
	}

	public function register(SingleObj $singleton)
	{
		$singleton->register('config', function() {
			return new Raw(BASE . '/config');
		});
	}
}