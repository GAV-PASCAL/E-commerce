<div>
    @if($hasUnreadMessages)
        <span class="message-notification-dot"></span>
    @endif

    <style>
        .message-notification-dot {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 20px;
            height: 20px;
            background-color: var(--primary-color);
            border-radius: 50%;
            border: 2px solid white;
            animation: pulse-dot 2s infinite;
            z-index: 10;
        }

        @keyframes pulse-dot {
            0% { 
                transform: scale(1); 
                opacity: 1;
            }
            50% { 
                transform: scale(1.2); 
                opacity: 0.8;
            }
            100% { 
                transform: scale(1); 
                opacity: 1;
            }
        }
    </style>
</div>
