<?php 

namespace App\Providers;

use Sect\Config\Raw as Config;
use Sect\Providers\ServiceProvider;
use Sect\Patterns\SingleObj;

class Func implements ServiceProvider
{
	public function boot()
	{
		$config = new Config(BASE . 'config');
		foreach ($config->fire('Func') as $file) require_once (sprintf('%s/app/Func/%s.php', BASE, $file));
	}

	public function register(SingleObj $singleton)
	{
		//
	}
}