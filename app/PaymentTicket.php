<?php

namespace App;

use App\Traits\SoftDelete;

class PaymentTicket extends Model
{
	protected $table    = 'payment_tickets';
	protected $fillable = [
		'payment_id',
		'due_date',
		'number',
		'created_at',
		'updated_at',
	];

	use SoftDelete;

	/*
	|----------------------------------------------------------------------------
	| Helpers
	|----------------------------------------------------------------------------
	*/

	public function generateNumber($payment_id)
	{
		do {

			$number = $payment_id . mt_rand(100, 1000000);
			$search = $this->select()->where('number = :number', compact('number'))->execute();
			$exits  = count($search);

		} while ($exits);

		return $number;
	}
}