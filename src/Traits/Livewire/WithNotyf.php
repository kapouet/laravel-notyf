<?php

namespace Kapouet\Notyf\Traits\Livewire;

trait WithNotyf
{
    protected function notyfSuccess(string $message): void
    {
        $this->notyfMessage('success', $message);
    }

    protected function notyfError(string $message): void
    {
        $this->notyfMessage('error', $message);
    }

    protected function notyfMessage(string $type, string $message): void
    {
        $this->emit('kapouet.notyf.message', compact('type', 'message'));
    }
}
