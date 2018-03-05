<?php 

namespace App;

class PaymentCard extends Model
{
	protected $table = 'payment_cards';
	protected $fillable = [
		'payment_id',
		'card_number',
		'code',
		'owner_name',
		'due_date',
		'created_at',
		'updated_at'
	];
}