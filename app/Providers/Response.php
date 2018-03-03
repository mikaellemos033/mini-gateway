<?php 

namespace App\Providers;

use App\Render\Rest;
use Sect\Providers\ServiceProvider;
use Sect\Patterns\SingleObj;

class Response implements ServiceProvider
{
	public function boot()
	{
		//
	}

	public function register(SingleObj $singleton)
	{
		$singleton->register('json', function() {
			return new Rest();
		});
	}
}