<?php

namespace AMacSmith\ObserverPattern\RealWorldSolution\Observers;

use AMacSmith\ObserverPattern\RealWorldSolution\Subjects\ChatRoom;

interface Chatter
{
    public function displayLastMessage(): void;

    public function sendMessage(string $text): void;

    public function setChatRoom(ChatRoom $chatRoom);
}
