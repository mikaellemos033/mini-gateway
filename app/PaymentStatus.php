<?php

namespace App;

use App\Traits\Finders;
use App\Traits\SoftDelete;

class PaymentStatus extends Model
{
	const PENDING  = 'pending';
	const PAID     = 'paid';
	const CANCELED = 'canceled';

	protected $table = 'payment_status';
	protected $fillable = [
		'name',
		'alias',
		'created_at',
		'updated_at'		
	];

	use SoftDelete;
	use Finders;
}