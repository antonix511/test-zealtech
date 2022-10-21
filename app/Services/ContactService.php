<?php

namespace App\Services;

use App\Contact;
use App\Repository\ContactRepository;
use App\Validators\RegexValidators;

class ContactService
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ContactRepository();
    }

    public function findByName($name)
	{
        $result = $this->repository->getByName($name);

        if (is_null($result)) return null;

        return new Contact($result['name'], $result['phone']);
	}

	public static function validateNumber($number)
	{
        $number = str_replace('-', '', $number);
        return preg_match(RegexValidators::$phoneRegex, $number);
	}
}