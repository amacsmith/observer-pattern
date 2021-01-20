<?php


namespace AMacSmith\ObserverPattern\Tests;


use AMacSmith\ObserverPattern\RealWorldSolution\Message;
use AMacSmith\ObserverPattern\RealWorldSolution\Observers\User;
use AMacSmith\ObserverPattern\RealWorldSolution\Subjects\ChatRoom;
use PHPUnit\Framework\TestCase;

class ChatRoomTest extends TestCase
{
    /**
     * @var ChatRoom
     */
    private ChatRoom $chatRoom;

    private User $jerry;
    private User $bill;
    private User $ted;

    protected function setUp(): void
    {
        $this->chatRoom = new ChatRoom('Amac\'s Chat Room');
        $this->jerry = new User('Jerry');
        $this->bill = new User('Bill');
        $this->ted = new User('Ted');
        $this->chatRoom->register($this->jerry)
                        ->register($this->bill)
                        ->register($this->ted);
    }

    public function test_can_send_and_receive_messages_in_our_chatroom()
    {
        $texts = [
            'Hey Bill!',
            'Hello Jerry.',
            'Howdy Ted.',
            'Hi Jerry.'
        ];

        $this->jerry->sendMessage($texts[0]);
        $this->bill->sendMessage($texts[1]);
        $this->jerry->sendMessage($texts[2]);
        $this->ted->sendMessage($texts[3]);

        echo PHP_EOL.PHP_EOL;
        echo "{$this->chatRoom->getName()}'s Message History:".PHP_EOL;
        $this->chatRoom->getHistory()->display();

        $messages = $this->chatRoom->getHistory()->messages();

        $textIndex = 0;
        foreach ($messages as $message) {
            /**
             * @var Message $message
             */
            $this->assertEquals($texts[$textIndex], $message->getMessage());
            $textIndex++;
        }
    }

    public function test_can_change_chat_room_name()
    {
        $this->assertEquals('Amac\'s Chat Room', $this->chatRoom->getName());
        $this->chatRoom->setName('Tom\'s Chat Room');
        $this->assertEquals('Tom\'s Chat Room', $this->chatRoom->getName());
    }

    public function test_can_unregister_users_from_chat_room()
    {
        $this->assertCount(3, $this->chatRoom->getUsers());

        $this->chatRoom->unregister($this->jerry);
        $this->assertCount(2, $this->chatRoom->getUsers());

        $this->chatRoom->unregister($this->bill);
        $this->assertCount(1, $this->chatRoom->getUsers());

        $this->chatRoom->unregister($this->ted);
        $this->assertCount(0, $this->chatRoom->getUsers());
    }
}