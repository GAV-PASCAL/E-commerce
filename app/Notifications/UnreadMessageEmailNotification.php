<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class UnreadMessageEmailNotification extends Notification
{
    use Queueable;

    protected $message;

    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        // Uniquement par email pour ce rappel
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $senderName = $this->message->sender->prenom . ' ' . $this->message->sender->nom;
        $messagePreview = Str::limit($this->message->message, 100);

        return (new MailMessage)
            ->subject('💬 Vous avez un message non lu de ' . $senderName)
            ->greeting('Bonjour ' . $notifiable->prenom . ',')
            ->line('Vous avez reçu un message il y a 5 minutes que vous n\'avez pas encore lu.')
            ->line('**De :** ' . $senderName)
            ->line('**Message :** ' . $messagePreview)
            ->action('Lire le message', route('conversations.index'))
            ->line('Merci de répondre dès que possible pour maintenir une bonne communication avec vos clients/vendeurs.')
            ->salutation("Cordialement,\nL'équipe EasyOrder");
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
