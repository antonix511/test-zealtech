<?php

namespace App;

use App\Interfaces\CarrierInterface;
use App\Services\ContactService;

class Mobile
{
	protected $provider;

	private $service;
	
	function __construct(CarrierInterface $provider)
	{
		$this->provider = $provider;
        $this->service = new ContactService();
	}

	public function makeCallByName($name = '')
	{
		if( empty($name) ) return;

		$contact = $this->service->findByName($name);

		if (is_null($contact)) return null;

		$this->provider->dialContact($contact);

		return $this->provider->makeCall();
	}

    public function sendSMS($name = '', $body = '')
    {
        if (empty($name)) return ;

        $contact = $this->service->findByName($name);

        if (is_null($contact)) return null;

        $this->provider->dialContact($contact);

        return $this->provider->sendSMS($body);
    }
}
