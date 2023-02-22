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
        return ['mail'];
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
            // 'id_order' => $this->user['id_order'],
            // 'nama' => $this->user['nama'],
            // 'message' => $this->user['message'],
            // 'pemesan' => $this->user['pemesan'],
            // 'date' => $this->user['date'],
            // 'time' => $this->user['time']
        ];
    }
}
