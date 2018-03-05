<?php 

namespace App\Repositories;

use PDO;

class FullPayments
{
	public function search($id)
	{
		$search   = single('db');
		$payments = [];
		$query    = $search->getPdo()->prepare($this->query());		

		$query->execute(compact('id'));
		
		$items = $query->fetchAll(PDO::FETCH_CLASS);

		foreach ($items as $item) {

			$payments[] = array_filter([
				'user' => [
					'id'    => $item->user_id,
					'name'  => $item->user_name,
					'email' => $item->user_email,
				],
				'corporation' => [
					'id'   => $item->corporation_id,
					'name' => $item->corporation,
				],
				'amount'   => $item->amount,
				'status'   => $item->payment_status,
				'type'     => $item->payment_type,
				'amount'   => $item->amount,
				'due_date' => $item->due_date,
				'number'   => $item->number,
				'id'       => $item->id
			]);
		}

		return $payments;
	}

	private function query()
	{
		return "
			select

				payments.*,
				payment_types.name as payment_type,
				payment_status.name as payment_status,
				users.name as user_name,
				users.email as user_email,
				users.document as user_document,
				corporations.name as corporation,
				payment_tickets.number as number,
				payment_tickets.due_date as due_date

			from payments 
			inner join corporations on corporations.id = payments.corporation_id
			left join payment_tickets on payment_tickets.payment_id = payments.id
			inner join users on users.id = payments.user_id
			inner join payment_status on payment_status.id = payments.payment_status_id
			inner join payment_types on payment_types.id = payments.payment_type_id
			where payments.id = :id
		";
	}
}