<?php

namespace App\Http\Controllers;

use App\Services\Http\PaymentCards;
use App\Services\Http\PaymentTicket;
use App\Repositories\FullPayments;
use App\Payment;

class Payments
{
	public function index($id)
	{
		$repositorie = new Payment();
		$payment     = $repositorie->find($id);

		if (!count($payment)) {

			return single('json')->response([
				'success' => false,
				'message' => 'Pagamento não encontrado.'
			], 404);

		}

		$data = (new FullPayments())->search($id);

		return single('json')->response([
			'success' => true,
			'message' => 'Pagamento encontrado.',
			'data'    => [
				'payments' => $data
			]
		]);
	}

	public function credit()
	{
		$params = filter_input_array(INPUT_POST, FILTER_DEFAULT);
		$fields = [
			'corporation_id',
			'amount',
			'description',
			'user_name',
			'user_email',
			'user_document',
			'card_name',
			'card_number',
			'card_code',
			'card_date'
		];

		foreach ($fields as $field)
			if (!array_key_exists($field, $params)) return $this->invalidRequest($fields);

		$service  = new PaymentCards();
		$response = $service->handle($params);

		if ($response->success) {

			return single('json')->response([
				'success' => true,
				'message' => 'Pagamento registrado com sucesso.',
				'data'    => [
					'payment_id' => $response->content->payment_id
				]
			], 201);

		}

		return single('json')->response([
			'success' => false,
			'message' => $response->message,
		], 412);

	}

	public function ticket()
	{
		$params = filter_input_array(INPUT_POST, FILTER_DEFAULT);		

		$fields = [
			'corporation_id',
			'amount',
			'description',
			'user_name',
			'user_email',
			'user_document'
		];

		foreach ($fields as $field)
			if (!array_key_exists($field, $params)) return $this->invalidRequest($fields);

		$service  = new PaymentTicket();
		$response = $service->handle($params);

		if ($response->success) {

			return single('json')->response([
				'success' => true,
				'message' => 'Pagamento registrado com sucesso.',
				'data'    => [
					'payment_id' => $response->content->payment_id
				]
			], 201);

		}

		return single('json')->response([
			'success' => false,
			'message' => $response->message,
		], 412);
	}

	private function invalidRequest(array $data)
	{
		return single('json')->response([
			'success' => false,
			'message' => 'Parâmetros inválidos.',
			'error'   => [
				'fields_required' => $data
			]
		], 406);
	}
}