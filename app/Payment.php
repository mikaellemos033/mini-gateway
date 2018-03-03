<?php

namespace App;

use App\Traits\SoftDelete;

class Payment extends Model
{
	protected $table = 'payments';
	protected $fillable = [
		'payment_type_id',
		'corporation_id',
		'user_id',
		'amount',
		'total_amount',
		'created_at',
		'updated_at'
	];

	use SoftDelete;
}