<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyNelayan extends Notification
{
    use Queueable;
    private $details;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject($this->details['subject'])
            ->greeting($this->details['greeting'])
            ->line($this->details['body'])
            ->action($this->details['link'], $this->details['url'])
            ->line($this->details['date'])
            ->line($this->details['time']);
    }
    // public function toDatabase($notifiable)
    // {
    //     return ['id' => $this->details['id']];
    // }
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id_order' => $this->details['id_order'],
            'subject' => $this->details['subject'],
            'greeting' => $this->details['greeting'],
            'body' => $this->details['body'],
            'link' => $this->details['link'],
            'url' => $this->details['url'],
            'date' => $this->details['date'],
            'time' => $this->details['time']
        ];
    }
}
