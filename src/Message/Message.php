<?php

namespace App\Message;

class Message
{

    public function __construct(private string $text)
    {
    }

    public function getText()
    {
        return $this->text;
    }

}