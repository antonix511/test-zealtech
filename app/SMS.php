<?php

namespace App;

class SMS
{
    private $number;
    private $body;

    public function __construct($number, $body)
    {
        $this->number = $number;
        $this->body = $body;
    }

    public function __invoke()
    {
        return true;
    }
}