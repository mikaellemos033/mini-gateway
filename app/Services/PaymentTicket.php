<?php

namespace App\Services;

use App\PaymentTicket as Model;

class PaymentTicket extends BaseService
{
	public function boot(array $params = [])
	{
		$repositorie        = new Model();
		
		$params['number']   = $repositorie->generateNumber($params['payment_id']);
		$params['due_date'] = date('Y-m-d H:i:s');
		$payment            = $repositorie->create($params);

		if ($payment) return $this->success('Boleto criado com sucesso.', $payment);
		return $this->error('Houve um problema no cadastro');
	}

	public function rules()
	{
		return [
			'payment_id'
		];
	}
}