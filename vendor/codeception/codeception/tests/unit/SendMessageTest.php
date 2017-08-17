<?php


class SendMessageTest extends \Codeception\Test\Unit
{
    /**
     * @var \CodeGuy
     */
    protected $tester;

    protected function _before()
    {
        $actual = new \Storage\PluginMem();
        $user = new \Domain\User();
        $user->SetAlias("Test");
        $user->SetEmail("Test@test.com");
        $chat = new \Domain\ChatRoom();
        $chat->SetChatName("Test");
        $chat->SetActive(1);
        $actual->Create($user);
        $actualUser = $actual->Read(0);
        $actual->Create($chat);
        $actualChat = $actual->Read(0);
    }

    protected function _after()
    {
    }

    // tests
    public function testSendMessage()
    {
        // arrange
        $actual = new \Storage\PluginMem();
        $message = new \Domain\Message();
        $message->SetMessageContent("Test");
        $message->SetChatRoomId($actualChat->ChatRoomId());
        $message->SetUserId($actualUser->UserId());

        // act
        $actual->Create($message);
        $actualMessage = $actual->Read(0);

        //assert
        $this->assertEquals(1, $actual->Count());
        $this->assertEquals("Test", $actualMessage->MessageContent());
        $this->assertEquals($actualChat->ChatRoomId(), $actualMessage->ChatRoomId());
        $this->assertEqulas($actualUser->UserId(), $actualMessage->UserId());
    }

    public function testEmptyMessage()
    {
        // arrange
        $actual = new \Storage\PluginMem();
        $message = new \Domain\Message();
        $message->SetMessageContent("");
        $message->SetChatRoomId($actualChat->ChatRoomId());
        $message->SetUserId($actualUser->UserId());

        // act
        $actual->Create($message);
        $actualMessage = $actual->Read(0);

        //assert
        $this->assertEquals(0, $actual->Count());
    }
}