<?php

namespace AMacSmith\ObserverPattern\RealWorldSolution\Subjects;

use AMacSmith\ObserverPattern\RealWorldSolution\Message;
use AMacSmith\ObserverPattern\RealWorldSolution\MessageHistory;
use AMacSmith\ObserverPattern\RealWorldSolution\Observer;
use AMacSmith\ObserverPattern\RealWorldSolution\Observers\Chatter;
use AMacSmith\ObserverPattern\RealWorldSolution\Subject;
use JetBrains\PhpStorm\Pure;

class ChatRoom implements Subject
{
    private array $users = [];
    private MessageHistory $history;

    /**
     * ChatRoom constructor.
     * @param string $name
     */
    #[Pure] public function __construct(private string $name){
        $this->history = new MessageHistory();
    }

    /**
     * @param Chatter|Observer $observer
     * @return Subject
     */
    public function register(Chatter|Observer $observer): Subject
    {
        $this->users[] = $observer;
        $this->registerChatter($observer);
        return $this;
    }

    /**
     * @param Chatter $chatter
     */
    private function registerChatter(Chatter $chatter): void
    {
        $chatter->setChatRoom($this);
    }

    /**
     * @param Observer|Chatter $observer
     * @return Subject
     */
    public function unregister(Observer|Chatter $observer): Subject
    {
        if(($key = array_search($observer, $this->users,true)) !== FALSE) {
            unset($this->users[$key]);
        }
        return $this;
    }

    public function notify(): void
    {
        foreach($this->users as $user) {
            $user->update();
        }
    }

    /**
     * @return MessageHistory
     */
    public function getMessages(): MessageHistory
    {
        return $this->history;
    }

    /**
     * @param Message $message
     */
    public function newMessage(Message $message): void
    {
        $this->history->addMessage($message);
        $this->notify();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return MessageHistory
     */
    public function getHistory(): MessageHistory
    {
        return $this->history;
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->users;
    }
}