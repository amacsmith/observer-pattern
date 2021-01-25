<?php


namespace AMacSmith\ObserverPattern\RealWorldSolution\Observers;


use AMacSmith\ObserverPattern\RealWorldSolution\Observer;
use AMacSmith\ObserverPattern\RealWorldSolution\Subjects\ChatRoom;

class Moderator implements Observer, Watcher
{
    private ChatRoom $chatRoom;

    /**
     * Update user when ChatRoom has a new Message
     */
    public function update(): void
    {
        $this->displayLastMessage();
    }

    public function displayLastMessage(): void
    {
        $history = $this->chatRoom->getMessages()->messages();
        $message = end($history);
        echo "MODERATOR WATCHING: {$message->getFrom()} [{$message->getSentAt()}]: {$message->getMessage()}".PHP_EOL;
    }

    public function setChatRoom(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;
    }
}