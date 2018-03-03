<?php

namespace App;

use App\Traits\SoftDelete;

class PaymentTicket extends Model
{
	protected $table = 'payment_tickets';
	protected $fillable = [
		'payment_id',
		'due_date',
		'number',
		'created_at',
		'updated_at',
	];

	use SoftDelete;
}