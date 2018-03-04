<?php 

namespace App\Services;

use stdClass;
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

	private function response($success, $message, $content = null)
	{
		$response = new stdClass();
		$response->success = $success;
		$response->message = $message;
		$response->content = $content;

		return $response;
	}

	final protected function success($message, $content)
	{
		return $this->response(true, $message, $content);
	}

	final protected function error($message, $content)
	{
		return $this->response(true, $message, $content);
	}

	abstract public function boot(array $params = []);

	abstract public function rules();
}