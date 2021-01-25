<?php


namespace AMacSmith\ObserverPattern\RealWorldSolution\Observers;


use AMacSmith\ObserverPattern\RealWorldSolution\Subjects\ChatRoom;

interface Watcher
{
    public function setChatRoom(ChatRoom $chatRoom);

    public function displayLastMessage(): void;
}