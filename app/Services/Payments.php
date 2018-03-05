<?php

namespace App\Services;

use App\Payment;

class Payments extends BaseService
{
	public function boot(array $params = [])
	{
		$model   = new Payment();
		$payment = $model->create($params);

		if ($payment) return $this->success('Pagamento criado com sucesso.', $payment);
		return $this->error('Não foi possível registrar seu pagamento');
	}

	public function rules()
	{
		return [
			'user_id',
			'corporation_id',
			'payment_status_id',
			'payment_type_id',
			'user_id',
			'amount'
		];
	}
}