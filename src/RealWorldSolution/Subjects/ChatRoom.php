<?php

namespace AMacSmith\ObserverPattern\RealWorldSolution\Subjects;

use AMacSmith\ObserverPattern\RealWorldSolution\Message;
use AMacSmith\ObserverPattern\RealWorldSolution\MessageHistory;
use AMacSmith\ObserverPattern\RealWorldSolution\Observer;
use AMacSmith\ObserverPattern\RealWorldSolution\Observers\Chatter;
use AMacSmith\ObserverPattern\RealWorldSolution\Subject;

class ChatRoom implements Subject
{
    private array $users = [];
    private MessageHistory $history;
    private string $name;

    /**
     * ChatRoom constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->history = new MessageHistory();
    }

    /**
     * @param Chatter|Observer $observer
     * @return Subject
     */
    public function register($observer): Subject
    {
        $this->users[] = $observer;
        $this->registerChatter($observer);

        return $this;
    }

    /**
     * @param Chatter|Observer $chatter
     */
    private function registerChatter(Chatter|Observer $chatter): void
    {
        $chatter->setChatRoom($this);
    }

    /**
     * @param Observer|Chatter $observer
     * @return Subject
     */
    public function unregister($observer): Subject
    {
        if (($key = array_search($observer, $this->users, true)) !== false) {
            unset($this->users[$key]);
        }

        return $this;
    }

    public function notify(): void
    {
        foreach ($this->users as $user) {
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
