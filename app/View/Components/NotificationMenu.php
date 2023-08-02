<?php

namespace App\View\Components;

use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NotificationMenu extends Component
{
    /**
     * Create a new component instance.
     */

    public $notifications;
    public $new;

    public function __construct($count = 10)
    {
        $user = Auth::user();
        $this->notifications = $user->notifications()->take($count)->get();

        // $user->unreadNotifications()->count() return query builder and this's best
        // $user->unreadNotifications->count() return collection
        $this->new = $user->unreadNotifications()->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notification-menu');
    }
}
