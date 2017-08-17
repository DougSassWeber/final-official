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
        $user = new \Domain\USER("Test","Test@test.com");
        $chat = new \Domain\ChatRoom("Test");
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
        $message = new \Domain\Message("Test",$actualUser->UserId(),$actualChat->ChatRoomId());

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
        $message = new \Domain\Message("",$actualUser->UserId(),$actualChat->ChatRoomId());

        // act
        $actual->Create($message);
        $actualMessage = $actual->Read(0);

        //assert
        $this->assertEquals(0, $actual->Count());
    }
}