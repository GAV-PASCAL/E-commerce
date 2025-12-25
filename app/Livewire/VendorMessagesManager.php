<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class VendorMessagesManager extends Component
{
    public $selectedConversationId = null;

    #[On('conversationSelected')]
    public function selectConversation($conversationId)
    {
        $this->selectedConversationId = $conversationId;
    }

    public function render()
    {
        return view('livewire.vendor-messages-manager');
    }
}
