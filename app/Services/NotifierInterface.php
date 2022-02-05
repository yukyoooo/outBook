<?php

namespace App\Services;

interface NotifierInterface
{
    public function send(string $to, string $message): void;
}
