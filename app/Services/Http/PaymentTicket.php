<?php

namespace App\Services\Http;

use App\Services\BaseService;
use App\PaymentStatus;
use App\PaymentType;
use App\Services\Payments;
use App\Services\Users\Search;
use App\Services\PaymentTicket as ServiceTicket;

class PaymentTicket extends BaseService
{
	public function boot(array $params = [])
	{
		$status  = (new PaymentStatus())->alias(PaymentStatus::PENDING);
		$type    = (new PaymentType())->alias(PaymentType::TICKET);
		$users   = new Search();
		$user    = $users->handle([
			'name'     => $params['user_name'],
			'document' => $params['user_document'],
			'email'    => $params['user_email']
		]);

		if (!$user->success) return $user;
		
		$payment = (new Payments())->handle([
			'corporation_id'    => $params['corporation_id'],
			'payment_status_id' => $status->id,
			'payment_type_id'   => $type->id,
			'user_id'        => $user->content->id,
			'description'    => $params['description'],
			'amount'         => $params['amount'],
		]);

		if (!$payment->success) return $payment;
		
		$paymentTicket = new ServiceTicket();
		return $paymentTicket->handle(['payment_id' => $payment->content->id]);
	}

	public function rules()
	{
		return [
			'corporation_id',
			'amount',
			'description',
			'user_name',
			'user_email',
			'user_document',
		];
		
	}
}