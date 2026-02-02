<div class="notification-badge-wrapper">
    <a href="{{ route('conversations.index') }}" class="notification-icon-link">
        <i class='bx bx-message-rounded-dots'></i>
        @if($unreadMessagesCount > 0)
            <span class="badge badge-msg">{{ $unreadMessagesCount }}</span>
        @endif
    </a>

    <style>
        .notification-badge-wrapper {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-right: 15px;
        }
        .notification-icon-link {
            position: relative;
            color: #4b5563;
            font-size: 1.5rem;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        .notification-icon-link:hover {
            color: #B45309;
        }
        .badge {
            position: absolute;
            top: -5px;
            right: -8px;
            background-color: #ef4444;
            color: white;
            font-size: 0.7rem;
            font-weight: bold;
            padding: 2px 5px;
            border-radius: 50%;
            min-width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
</div>
