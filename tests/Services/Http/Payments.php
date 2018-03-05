<?php 

use App\Services\Http\PaymentTicket;
use App\Services\Http\PaymentCards;
use App\Services\Corporation;

class PaymentsTest extends PHPUnit_Framework_TestCase
{
	public function testPaymentTicket()
	{
		$corp = new Corporation();
		$corporation = $corp->handle(['name' => 'Moip']);

		$service = new PaymentTicket();
		$payment = $service->handle([
			'corporation_id' => $corporation->content->id,
			'user_name'      => 'Mikael Lemos',
			'user_document'  => '446.890.898-09',
			'user_email'     => 'mikaellemos033@gmail.com',
			'description'    => 'Comprando uma vaga de emprego',
			'amount'         => mt_rand(10, 100)
		]);

		$this->assertTrue($payment->success);
		$this->assertEquals('Boleto criado com sucesso.', $payment->message);
	}

	public function testPaymentcard()
	{
		$corp = new Corporation();
		$corporation = $corp->handle(['name' => 'Moip']);

		$service = new PaymentCards();
		$payment = $service->handle([
			'corporation_id' => $corporation->content->id,
			'user_name'      => 'Mikael Lemos',
			'user_document'  => '446.890.898-09',
			'user_email'     => 'mikaellemos033@gmail.com',
			'description'    => 'Comprando uma vaga de emprego',
			'amount'         => mt_rand(10, 100),
			'card_name'      => 'Mikael Lemos',
			'card_number'    => '5555 5555 5555 5551',
			'card_code'      => '124',
			'card_date'      => '10/20'
		]);

		$this->assertTrue($payment->success);
		$this->assertEquals('Cartão salvo com sucesso.', $payment->message);
	}
}