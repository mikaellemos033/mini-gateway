<?php

namespace App\Providers;

use Sect\Config\Raw as Config;
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
			return new Config(BASE . '/config');
		});
	}
}