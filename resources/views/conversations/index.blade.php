@extends('layouts.app')

@section('title', 'Mes Conversations')

@section('header')

    <section>
        <div class="title_dash">
            <div>
                <h1>DASHBOARD</h1>
            </div>
            <div class="conversation-header-page">
                <a href="{{ url('./') }}" class="back-btn">
                    <i class='bx bx-arrow-back'></i>
                    Retour
                </a>
            </div>
        </div>
    </section>

@endsection

@section('content')

<div id="page_structure">
        <x-client/>

        <div class="section_dash" id="patie">

            <div class="back_formulaire">
                
                <div class="conversations-page">
                    <div class="page-header">
                        <h1><i class='bx bx-chat'></i> Mes Conversations</h1>
                        <p>Discutez avec le vendeur à propos de vos produits</p>
                    </div>

                    <div class="conversations-container">
                        @forelse($conversations as $conversation)
                            <a href="{{ route('conversations.show', $conversation->id) }}" class="conversation-card">
                                <div class="conversation-icon">
                                    <i class='bx bx-store'></i>
                                </div>
                                
                                <div class="conversation-details">
                                    <div class="conversation-header">
                                        <h3>Conversation avec le Vendeur</h3>
                                        @if($conversation->last_message_at)
                                            <span class="conversation-date">
                                                {{ $conversation->last_message_at->diffForHumans() }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    @if($conversation->lastMessage)
                                        <p class="last-message">
                                            <i class='bx bx-message-detail'></i>
                                            {{ Str::limit($conversation->lastMessage->message, 100) }}
                                        </p>
                                    @else
                                        <p class="last-message no-message">
                                            <i class='bx bx-message-x'></i>
                                            Aucun message
                                        </p>
                                    @endif
                                </div>
                                
                                <div class="conversation-arrow">
                                    <i class='bx bx-chevron-right'></i>
                                </div>
                            </a>
                        @empty
                            <div class="no-conversations">
                                <i class='bx bx-message-square-x'></i>
                                <h3>Aucune conversation</h3>
                                <p>Vous n'avez pas encore de conversation avec le vendeur.</p>
                                <p>Commencez une conversation depuis la page d'un produit !</p>
                                <a href="{{ route('produits.liste') }}" class="btn-primary">
                                    <i class='bx bx-shopping-bag'></i>
                                    Voir les produits
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <style>
                .conversations-page {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 40px 20px;
                }

                .page-header {
                    text-align: center;
                    margin-bottom: 40px;
                }

                .page-header h1 {
                    font-size: 2.5rem;
                    color: #2c3e50;
                    margin: 0 0 10px 0;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 15px;
                }

                .page-header h1 i {
                    font-size: 3rem;
                    color: #92400E;
                }

                .page-header p {
                    font-size: 1.1rem;
                    color: #7f8c8d;
                    margin: 0;
                }

                .conversations-container {
                    display: flex;
                    flex-direction: column;
                    gap: 20px;
                }

                .conversation-card {
                    background: white;
                    border-radius: 15px;
                    padding: 25px;
                    display: flex;
                    align-items: center;
                    gap: 20px;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                    transition: all 0.3s ease;
                    text-decoration: none;
                    color: inherit;
                    border: 2px solid transparent;
                }

                .conversation-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 8px 25px rgba(52, 152, 219, 0.2);
                    border-color: #B45309;
                }

                .conversation-icon {
                    background: linear-gradient(135deg, #92400E 0%, #B45309 100%);
                    width: 70px;
                    height: 70px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-shrink: 0;
                }

                .conversation-icon i {
                    font-size: 2.5rem;
                    color: white;
                }

                .conversation-details {
                    flex: 1;
                    min-width: 0;
                }

                .conversation-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 10px;
                }

                .conversation-header h3 {
                    margin: 0;
                    font-size: 1.3rem;
                    color: #B45309;
                    font-weight: 600;
                }

                .conversation-date {
                    font-size: 0.9rem;
                    color: #95a5a6;
                    white-space: nowrap;
                }

                .last-message {
                    margin: 0;
                    font-size: 1rem;
                    color: #7f8c8d;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    white-space: nowrap;
                }

                .last-message i {
                    font-size: 1.2rem;
                    flex-shrink: 0;
                }

                .last-message.no-message {
                    color: #bdc3c7;
                    font-style: italic;
                }

                .conversation-arrow {
                    flex-shrink: 0;
                }

                .conversation-arrow i {
                    font-size: 2rem;
                    color: #9d9fa0ff;
                    transition: all 0.3s ease;
                }

                .conversation-card:hover .conversation-arrow i {
                    color: #B45309;
                    transform: translateX(5px);
                }

                .no-conversations {
                    background: white;
                    border-radius: 15px;
                    padding: 60px 40px;
                    text-align: center;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                }

                .no-conversations i {
                    font-size: 5rem;
                    color: #ecf0f1;
                    margin-bottom: 20px;
                }

                .no-conversations h3 {
                    font-size: 1.8rem;
                    color: #2c3e50;
                    margin: 0 0 15px 0;
                }

                .no-conversations p {
                    font-size: 1.1rem;
                    color: #7f8c8d;
                    margin: 0 0 10px 0;
                }

                .btn-primary {
                    display: inline-flex;
                    align-items: center;
                    gap: 10px;
                    background: linear-gradient(135deg, #92400E 0%, #B45309 100%);
                    color: white;
                    padding: 15px 30px;
                    border-radius: 25px;
                    text-decoration: none;
                    font-weight: 600;
                    font-size: 1.1rem;
                    margin-top: 20px;
                    transition: all 0.3s ease;
                }

                .btn-primary:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 8px 20px #92410e8e;
                }

                .btn-primary i {
                    font-size: 1.3rem;
                }

                @media (max-width: 768px) {
                    .page-header h1 {
                        font-size: 2rem;
                    }
                    
                    .conversation-card {
                        padding: 20px;
                    }
                    
                    .conversation-icon {
                        width: 60px;
                        height: 60px;
                    }
                    
                    .conversation-icon i {
                        font-size: 2rem;
                    }
                    
                    .conversation-header {
                        flex-direction: column;
                        align-items: flex-start;
                        gap: 5px;
                    }
                }
                </style>
            </div>

        </div>
    </div>
</div>





@endsection
