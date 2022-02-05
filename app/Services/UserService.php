<?php

namespace App\Services;

use Illuminate\Mail\Mailer;


class UserService
{
    protected $notifier;

    public function __construct(NotifierInterface $notifier)
    {
        $this->notifier = $notifier;
    }

    public function sendNotification(string $to, string $message) : void
    {
        $this->notifier->send($to, $message);
    }

}
