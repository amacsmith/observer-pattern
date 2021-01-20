<?php

namespace AMacSmith\ObserverPattern\RealWorldSolution\Observers;

use AMacSmith\ObserverPattern\RealWorldSolution\Message;
use AMacSmith\ObserverPattern\RealWorldSolution\Observer;
use AMacSmith\ObserverPattern\RealWorldSolution\Subjects\ChatRoom;

class User implements Observer, Chatter
{

    private ChatRoom $chatRoom;
    /**
     * User constructor
     * @param string $name
     */
    public function __construct(private string $name)
    {}

    /**
     * Update user when ChatRoom has a new Message
     */
    public function update(): void
    {
        $this->displayLastMessage();
    }

    /**
     * Display the last Message in the ChatRoom
     */
    public function displayLastMessage(): void
    {
        $history = $this->chatRoom->getMessages()->messages();
        $message = end($history);
        echo "{$message->getFrom()} [{$message->getSentAt()}]: {$message->getMessage()}".PHP_EOL;
    }

    /**
     * Send a Message to a ChatRoom
     * @param string $text
     */
    public function sendMessage(string $text): void
    {
        $message = new Message($text, $this->name);
        $this->chatRoom->newMessage($message);
    }

    public function setChatRoom(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;
    }
}