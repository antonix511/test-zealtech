<?php

namespace Tests;

use App\Mobile;
use App\Movistar;
use App\Services\ContactService;
use Mockery as m;
use PHPUnit\Framework\TestCase;

class MobileTest extends TestCase
{
	
	/** @test */
	public function it_returns_null_when_name_empty()
	{
		$mobile = new Mobile(new Movistar());

		$this->assertNull($mobile->makeCallByName('Lalo'));
	}

	/** @test */
    public function it_returns_null_when_number_has_wrong_format()
    {
        $mobile = new Mobile(new Movistar());

        $this->assertNull($mobile->makeCallByName('Luis'));
    }

    /** @test */
    public function it_returns_true_when_provider_make_call()
    {
        $mobile = new Mobile(new Movistar());
        $this->assertTrue(($mobile->makeCallByName('Miguel'))->__invoke());
    }

    /** @test */
    public function it_returns_true_when_provider_send_message()
    {
        $mobile = new Mobile(new Movistar());
        $this->assertTrue(($mobile->sendSMS('Miguel', 'Hola'))->__invoke());
    }

    /** @test */
    public function it_returns_null_when_passing_not_valid_contact()
    {
        $mobile = new Mobile(new Movistar());
        // Jairo no existe en la bd
        $this->assertNull($mobile->makeCallByName('Jairo'));
    }

    /** @test */
    public function it_returns_true_when_is_valid_number()
    {
        $invalidNumber = '0101';
        $validNumber = '999919191';
        $this->assertTrue(boolval(ContactService::validateNumber($validNumber)));
    }
}
