<?php 

use App\Services\Corporation;

class CorporationTest extends PHPUnit_Framework_TestCase
{
	public function testCreate()
	{
		$service = new Corporation();
		$corp    = $service->handle(['name' => 'Mikael Corporation']);
		
		die(var_dump($corp));
		$this->assertTrue('true');
	}
}