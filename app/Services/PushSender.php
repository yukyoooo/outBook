<?php

namespace App\Services;

class PushSender implements NotifierInterface
{
    public function send(string $to, string $message): void
    {
        //プッシュ通知
    }
}
