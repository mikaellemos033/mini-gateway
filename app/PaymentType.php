<?php

namespace App;

use App\Traits\Finders;
use App\Traits\SoftDelete;

class PaymentType extends Model
{
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