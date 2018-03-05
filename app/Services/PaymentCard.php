<?php 

namespace App\Services;

use App\PaymentCard as Model;

class PaymentCard extends BaseService
{
	public function boot(array $params = [])
	{
		$repositorie = new Model();
		$payment     = $repositorie->create($params);

		if ($payment) return $this->success('Cartão salvo com sucesso.', $payment);
		return $this->error('Houve um problema com o cadastro do cartão..');
	}

	public function rules()
	{
		return [
			'payment_id',
			'card_number',
			'code',
			'owner_name',
			'due_date',
		];
	}
}