<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class RequestStatusNotification extends Notification
{
    use Queueable;

    private $status;
    private $message;

    public function __construct($status)
    {
        $this->status = $status;
        $this->message = $status == 'accepted' ? 'your request status: accepted ' : 'your request status: refused';
    }

    public function via($notifiable)
    {
        return ['database', 'broadcast']; // we use websocket
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            'status' => $this->status
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => $this->message,
            'status' => $this->status
        ]);
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->message)
                    ->action(' show request', url('/requests'))
                    ->line('think you');
    }
}
