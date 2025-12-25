<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Produits;
use App\Events\MessageSent;
use App\Events\ConversationUpdated;

class ConversationController extends Controller
{
    /**
     * Liste des conversations
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        
        if ($user->role_id == 1) { // Admin/Vendeur
            $conversations = Conversation::with(['user', 'lastMessage'])
                ->orderBy('last_message_at', 'desc')
                ->get();
            
            return view('dashbord.vendeur.messages.index', compact('conversations'));
        } else {
            $conversations = Conversation::where('user_id', $user->id)
                ->with(['lastMessage'])
                ->orderBy('last_message_at', 'desc')
                ->get();
            return view('conversations.index', compact('conversations'));
        }
    }

    /**
     * Afficher une conversation
     */
    public function show($id)
    {
        $conversation = Conversation::with(['user', 'messages.sender', 'messages.produit'])
            ->findOrFail($id);
        
        // Vérifier les permissions
        $user = auth()->user();
        if ($user->role_id != 1 && $conversation->user_id != $user->id) {
            abort(403);
        }
        
        // Marquer comme lu
        if ($user->role_id == 1) {
            $conversation->markAsRead();
        }
        
        return view('conversations.show', compact('conversation'));
    }

    /**
     * Créer une nouvelle conversation
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produit_id' => 'nullable|exists:produits,id',
            'message' => 'required|string|max:1000',
        ]);

        // Vérifier si une conversation existe déjà
        $conversation = Conversation::where('user_id', auth()->id())->first();
        
        if (!$conversation) {
            $conversation = Conversation::create([
                'user_id' => auth()->id(),
                'last_message_at' => now(),
            ]);
        }

        // Créer le message
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => auth()->id(),
            'message' => $validated['message'],
            'message_type' => 'text',
            'produit_id' => $validated['produit_id'] ?? null,
            'is_read' => false,
        ]);

        // Mettre à jour la conversation
        $conversation->incrementUnread();

        // Broadcast
        broadcast(new MessageSent($message))->toOthers();
        broadcast(new ConversationUpdated($conversation))->toOthers();

        return redirect()->route('conversations.show', $conversation->id);
    }

    /**
     * Marquer comme lu
     */
    public function markAsRead($id)
    {
        $conversation = Conversation::findOrFail($id);
        
        // Vérifier les permissions
        if (auth()->user()->role_id != 1) {
            abort(403);
        }
        
        $conversation->markAsRead();
        
        return response()->json(['success' => true]);
    }

    /**
     * Démarrer une conversation (avec ou sans produit)
     */
    public function startConversation($produitId = null)
    {
        $user = auth()->user();
        
        // Vérifier si l'utilisateur a déjà une conversation
        $conversation = Conversation::where('user_id', $user->id)->first();
        
        // Si pas de conversation, en créer une
        if (!$conversation) {
            $conversation = Conversation::create([
                'user_id' => $user->id,
                'last_message_at' => now(),
            ]);
        }
        
        // Si un produit est spécifié, créer un message initial avec le produit
        if ($produitId) {
            $produit = Produits::find($produitId);
            
            if ($produit) {
                // Vérifier s'il n'y a pas déjà un message pour ce produit
                $existingMessage = Message::where('conversation_id', $conversation->id)
                    ->where('produit_id', $produitId)
                    ->first();
                
                if (!$existingMessage) {
                    $message = Message::create([
                        'conversation_id' => $conversation->id,
                        'sender_id' => $user->id,
                        'message' => "Bonjour, je suis intéressé(e) par ce produit.",
                        'message_type' => 'text',
                        'produit_id' => $produitId,
                        'is_read' => false,
                    ]);
                    
                    // Mettre à jour la conversation
                    $conversation->incrementUnread();
                    
                    // Broadcast
                    broadcast(new MessageSent($message))->toOthers();
                    broadcast(new ConversationUpdated($conversation))->toOthers();
                }
            }
        }
        
        // Rediriger vers la conversation
        return redirect()->route('conversations.show', $conversation->id);
    }
}
