<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Message;
use App\Notifications\NewMessageNotification;

class SendUnreadMessageEmailJob implements ShouldQueue
{
    use Queueable;

    protected $messageId;
    protected $recipientId;

    /**
     * Create a new job instance.
     */
    public function __construct($messageId, $recipientId)
    {
        $this->messageId = $messageId;
        $this->recipientId = $recipientId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Log::info('SendUnreadMessageEmailJob: Démarrage', [
            'message_id' => $this->messageId,
            'recipient_id' => $this->recipientId,
        ]);

        // Récupérer le message
        $message = Message::with(['sender', 'conversation'])->find($this->messageId);
        
        // Si le message n'existe plus ou a été lu, ne rien faire
        if (!$message) {
            \Log::info('SendUnreadMessageEmailJob: Message introuvable', ['message_id' => $this->messageId]);
            return;
        }

        if ($message->is_read) {
            \Log::info('SendUnreadMessageEmailJob: Message déjà lu, pas d\'email envoyé', [
                'message_id' => $this->messageId,
            ]);
            return;
        }

        // Récupérer le destinataire
        $recipient = \App\Models\User::find($this->recipientId);
        
        if (!$recipient) {
            \Log::warning('SendUnreadMessageEmailJob: Destinataire introuvable', [
                'recipient_id' => $this->recipientId,
            ]);
            return;
        }

        // Créer une notification email spécifique
        \Log::info('SendUnreadMessageEmailJob: Envoi de l\'email', [
            'message_id' => $this->messageId,
            'recipient_email' => $recipient->email,
        ]);

        $recipient->notify(new \App\Notifications\UnreadMessageEmailNotification($message));

        \Log::info('SendUnreadMessageEmailJob: Email envoyé avec succès');
    }
}
