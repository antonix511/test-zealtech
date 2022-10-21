<?php

namespace App;

class Call
{
	private $number;

	function __construct($number)
	{
        $this->number = $number;
	}

	public function __invoke()
    {
        return true;
    }
}