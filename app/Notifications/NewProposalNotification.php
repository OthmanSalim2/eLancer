<?php

namespace App\Notifications;

use App\Channels\Log;
use App\Channels\Nepras;
use App\Models\Freelancer;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\AnonymousNotifiable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\VonageMessage;

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
        // return ['mail', 'database'];
        // $via = ['database', 'mail', 'broadcast', 'vonage'];
        // $via = ['database', 'mail', 'broadcast', 'nexmo'];
        $via = [Log::class, Nepras::class];

        if (!$notifiable instanceof AnonymousNotifiable) {

            if ($notifiable->notify_mail) {
                $via[] = 'mail';
            }
            if ($notifiable->notify_sms) {
                $via[] = 'nexmo';
            }
        }

        return $via;
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
            ->greeting('Hello' . ($notifiable->name ?? ''))
            ->line($body)
            // ->from('notification@localhost.net', 'E-Lancer Notification')
            // here possible use custom view
            // ->view('', [ to send the parameters to this view])
            ->action('View to Proposal', route('projects.show', $this->proposal->project_id))

            //this represent concluding message
            ->salutation('Thanks you very mush');
        // ->view('mails.proposal', [
        //     'freelancer' => '$this->freelancer',
        //     'notifiable' => $notifiable,
        //     'proposal' => $this->proposal,
        // ]);
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
        // other way to send data to broadcast channel
        // return new Broadcast ([])
        return [
            'title' => 'New Proposal',
            'body' => $body,
            'icon' => 'icon-material-outline-group',
            'url' => route('client.projects.show', $this->proposal->project_id),
        ];
    }

    /**
     * Get the Vonage / SMS representation of the notification.
     */
    public function toVonage($notifiable): VonageMessage
    {
        $body = sprintf(
            '%s applied for a job %s',
            $this->freelancer->name, // this will be instanced of the first %s
            $this->proposal->project->title, // this will be instanced of the second %s
        );

        return (new VonageMessage)
            // ->content('Your SMS message content');
            ->content($body);
    }

    public function toLog($notifiable)
    {
        $body = sprintf(
            '%s applied for a job %s',
            $this->freelancer->name, // this will be instanced of the first %s
            $this->proposal->project->title, // this will be instanced of the second %s
        );

        return $body;
    }

    public function toNepras($notifiable)
    {
        $body = sprintf(
            '%s applied for a job %s',
            $this->freelancer->name, // this will be instanced of the first %s
            $this->proposal->project->title, // this will be instanced of the second %s
        );

        return $body;
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
