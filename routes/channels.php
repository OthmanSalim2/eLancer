<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// the name of channel must changed it if change the name from model by receivesBroadcastNotificationsOn() method
// here this function if returned true the user be allow listen for notification but if returned false not allow listen for notification
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

/*
    here for PresenceChannel mean if was the current user has authorization to listen of channel will return
     the current user not like private channel but if was hasn't authorization to listening here he's cannot
     listen to channel
*/
Broadcast::channel('messages', function ($user, $id) {
    if ($user->id == $id) {
        return $user;
    }
});
