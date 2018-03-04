<?php 

namespace App\Services;

use Exception;

abstract class BaseService
{
	public function handle(array $params = [])
	{
		$this->validate($params);
		return $this->boot($params);
	}

	protected function validate(array $params)
	{
		foreach ($this->rules() as $rule)
			if (!array_key_exists($rule, $params)) throw new Exception(sprintf('Parameter %s not exists.', $rule));
		
		return true;
	}

	abstract public function boot(array $params = []);

	abstract public function rules();
}