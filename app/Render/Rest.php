<?php 

namespace App\Render;

class Rest
{
	public function response($params, $code = 200)
	{
		http_response_code($code);
		header('Content-Type: application/json');
		
		return json_encode($params);
	}
}