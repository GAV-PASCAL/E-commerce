<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderValidatedNotification extends Notification implements ShouldQueue
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
            ->subject('Commande validée : ' . $this->commande->numero_fiche)
            ->greeting('Bonjour ' . $notifiable->prenom . ',')
            ->line('Le client ' . $this->commande->user->nom . ' ' . $this->commande->user->prenom . ' a validé sa commande.')
            ->line('Numéro de fiche : ' . $this->commande->numero_fiche)
            ->line('Montant total : ' . number_format($this->commande->montant_total, 0, ',', ' ') . ' FCFA')
            ->action('Voir la commande', route('commandes.show', $this->commande))
            ->line('Vous pouvez maintenant procéder à la livraison.')
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
            'client_name' => $this->commande->user->nom . ' ' . $this->commande->user->prenom,
            'type' => 'order_validated',
            'message' => 'Un client a validé sa commande.',
        ];
    }

    public function toBroadcast(object $notifiable)
    {
        return new \Illuminate\Notifications\Messages\BroadcastMessage([
            'commande_uuid' => $this->commande->uuid,
            'numero_fiche' => $this->commande->numero_fiche,
            'client_name' => $this->commande->user->nom . ' ' . $this->commande->user->prenom,
            'message' => 'Commande validée !',
            'type' => 'order_validated',
        ]);
    }
}
