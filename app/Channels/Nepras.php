<?php

namespace App\Channels;

use Exception;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class Nepras
{

    protected $baseUrl = 'https://www.nsms.ps';

    // here notifiable represent the person is send to him the notification and represent user
    public function send($notifiable, Notification $notification)
    {
        // this code make send request on baseUrl
        // the parameters in array they are queries in url and be after question mark(?)
        $response = Http::get($this->baseUrl)
            ->get('api.php', [
                'comm' => 'sendsms',
                'users' => config('services.nepras.user'),
                'pass' => config('services.nepras.pass'),
                'to' => $notifiable->routeNotificationForNepras(),
                'message' => $notification->toNepras($notifiable),
                'sender' => config('services.nepras.sender'),
            ]);

        $code = $response->body();

        if ($code != 1) {
            throw new Exception($code);
        }
    }
}
