<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $commande;

    /**
     * Create a new notification instance.
     */
    public function __construct($commande)
    {
        $this->commande = $commande;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nouvelle fiche de commande : ' . $this->commande->numero_fiche)
            ->greeting('Bonjour ' . $notifiable->prenom . ',')
            ->line('Le vendeur a créé une nouvelle fiche de commande pour vous.')
            ->line('Numéro de fiche : ' . $this->commande->numero_fiche)
            ->line('Montant total : ' . number_format($this->commande->montant_total, 0, ',', ' ') . ' FCFA')
            ->action('Voir la commande', route('client.commandes.show', $this->commande))
            ->line('Merci de valider cette commande dès que possible.')
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
            'commande_id' => $this->commande->id,
            'commande_uuid' => $this->commande->uuid,
            'numero_fiche' => $this->commande->numero_fiche,
            'montant_total' => $this->commande->montant_total,
            'type' => 'order_created',
            'message' => 'Une nouvelle fiche de commande a été créée pour vous.',
        ];
    }

    public function toBroadcast(object $notifiable)
    {
        return new \Illuminate\Notifications\Messages\BroadcastMessage([
            'commande_uuid' => $this->commande->uuid,
            'numero_fiche' => $this->commande->numero_fiche,
            'message' => 'Nouvelle commande !',
            'type' => 'order_created',
        ]);
    }
}
