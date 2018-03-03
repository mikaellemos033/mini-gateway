<?php

namespace App\Http\Controllers;

use App\PaymentType;
use App\Corporation;

class Pages
{
	public function index()
	{
		return single('json')->response([
			'success' => true,
			'message' => 'Api Conectada'
		]);
	}

	public function corporations()
	{
		$corporations = (new Corporation())->all();
		$items        = [];

		foreach ($corporations as $corporation) {
			$items[]['alias'] = $corporation->alias;
			$items[]['name']  = $corporation->name;
		}
		
		return single('json')->response([
			'success' => true,
			'message' => 'Corporações listadas com sucesso',
			'data'    => ['corporations' => $items]
		]);
	}

	public function paymentTypes()
	{	
		$payments = (new PaymentType())->all();
		$items    = [];

		foreach ($payments as $payment) {
			$items[]['alias'] = $payment->alias;
			$items[]['name']  = $payment->name;
		}
				
		return single('json')->response([
			'success' => true,
			'message' => 'Tipos de Pagamentos listados com sucesso',
			'data'    => ['payment_type' => $items]
		]);
	}
}