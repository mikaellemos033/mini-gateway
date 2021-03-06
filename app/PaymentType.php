<?php

namespace App;

use App\Traits\Finders;
use App\Traits\SoftDelete;

class PaymentType extends Model
{
	const TICKET      = 'ticket';
	const CREDIT_CARD = 'credit_card';
	
	protected $table = 'payment_types';
	protected $fillable = [
		'name',
		'alias',
		'created_at',
		'updated_at'		
	];

	use SoftDelete;
	use Finders;
}