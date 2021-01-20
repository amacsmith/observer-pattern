<?php

namespace AMacSmith\ObserverPattern\RealWorldSolution;

class MessageHistory
{
    private array $messages = [];

    /**
     * @return array
     */
    public function messages(): array
    {
        return $this->messages;
    }

    /**
     * @param Message $message
     */
    public function addMessage(Message $message): void
    {
        $this->messages[] = $message;
    }

    /**
     * Display ChatRoom Messagehistory
     */
    public function display(): void
    {
        foreach ($this->messages() as $message) {
            echo "{$message->getFrom()} [{$message->getSentAt()}]: {$message->getMessage()}".PHP_EOL;
        }
    }
}