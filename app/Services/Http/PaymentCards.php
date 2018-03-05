<?php 

namespace App\Services\Http;

use App\PaymentStatus;
use App\PaymentType;
use App\Services\Payments;
use App\Services\PaymentCard;
use App\Services\Users\Search;
use App\Services\BaseService;

class PaymentCards extends BaseService
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

		$payment_card = new PaymentCard();
		
		return $payment_card->handle([
			'payment_id'  => $payment->content->id,
			'card_number' => $params['card_number'],
			'code'        => $params['card_code'],
			'owner_name'  => $params['card_name'],
			'due_date'    => $params['card_date']
		]);
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
			'card_name',
			'card_number',
			'card_code',			
			'card_date'
		];
	}
}