<?php

namespace App\Notifications;

use App\Models\Freelancer;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewProposalNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Proposal $proposal, public User $freelancer)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
        // return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    /*
    here $notifiable it use to determine the notification needed of user possible mail, broadcast, ...
    of course according of user settings
    */
    // here the notifiable represent the user model
    public function toMail(object $notifiable): MailMessage
    {
        $body = sprintf(
            '%s applied for a job %s',
            $this->freelancer->name, // this will be instanced of the first %s
            $this->proposal->project->title, // this will be instanced of the second %s
        );

        return (new MailMessage)
            ->subject('New Proposal')
            ->greeting('Hello' . $notifiable->name)
            ->line($body)
            // ->from('notification@localhost.net', 'E-Lancer Notification')
            // here possible use custom view
            // ->view('', [ to send the parameters to this view])
            ->action('View to Proposal', route('projects.show', $this->proposal->project_id))

            //this represent concluding message
            ->salutation('Thanks you very mush');
    }

    public function toDatabase($notifiable)
    {
        //
    }

    public function toBroadcast($notifiable)
    {
        $body = sprintf(
            '%s applied for a job %s',
            $this->freelancer->name, // this will be instanced of the first %s
            $this->proposal->project->title, // this will be instanced of the second %s
        );

        // here they are considered the main data possible added on it any extra data
        return [
            'title' => 'New Proposal',
            'body' => $body,
            'icon' => 'icon-material-outline-group',
            'url' => route('client.projects.show', $this->proposal->project_id),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    // this method it use for all channel if was any method from them not found
    public function toArray(object $notifiable): array
    {
        $body = sprintf(
            '%s applied for a job %s',
            $this->freelancer->name, // this will be instanced of the first %s
            $this->proposal->project->title, // this will be instanced of the second %s
        );

        // here they are considered the main data possible added on it any extra data
        return [
            'title' => 'New Proposal',
            'body' => $body,
            'icon' => 'icon-material-outline-group',
            'url' => route('client.projects.show', $this->proposal->project_id),
        ];
    }
}
