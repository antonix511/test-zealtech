<?php

namespace App;

use App\Interfaces\CarrierInterface;
use App\Services\ContactService;

class Movistar implements CarrierInterface
{
    private $contact;

    public function __construct() {}

    public function dialContact(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function makeCall()
    {
        return (ContactService::validateNumber($this->contact->getNumber())) ? new Call($this->contact->getNumber()) : null;
    }

    public function sendSMS($body)
    {
        return (ContactService::validateNumber($this->contact->getNumber())) ? new SMS($this->contact->getNumber(), $body) : null;
    }
}