<?php

namespace App\Services;

use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Log;

class MailSender implements NotifierInterface
{
    public function send(string $to, string $message): void
    {
        //メール送信
        Log::debug("To:".$to." message is :".$message);
    }
}
