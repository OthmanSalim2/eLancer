<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log as FacadesLog;

class Log
{

    // the propose from this function send message to log file
    public function send($notifiable, Notification $notification)
    {
        $message  = $notification->toLog($notifiable);
        FacadesLog::debug("[$notifiable->name] : $message");
    }
}
