<?php 

use App\Services\Corporation;

class CorporationTest extends PHPUnit_Framework_TestCase
{
	public function testCreate()
	{
		$name    = 'Mikael Corporation';
		$service = new Corporation();
		$corp    = $service->handle(compact('name'))->content;
				
		$this->assertTrue($corp instanceof stdClass);
		$this->assertEquals($name, $corp->name);
		$this->assertTrue(strpos($corp->alias, 'mikael-corporation') !== false);
	}
}