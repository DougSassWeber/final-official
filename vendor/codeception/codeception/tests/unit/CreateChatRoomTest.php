<?php


class CreateChatRoomTest extends \Codeception\Test\Unit
{
    /**
     * @var \CodeGuy
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testChatRoomCreation()
    {
        // arrange
        $actual = new \Storage\PluginMem();
        $chat = new \Domain\ChatRoom("Test");

        // act
        $actual->Create($chat);
        $actualChat = $actual->Read(0);

        //assert
        $this->assertEquals(1, $actual->Count());
        $this->assertEquals("Test", $actualChat->ChatName());
        $this->assertEqulas(1, $actualChat->Active());
    }

    public function testDuplicateChatRoom()
    {
        // arrange
        $actual = new \Storage\PluginMem();
        $chat1 = new \Domain\ChatRoom("Test");
        $chat2 = new \Domain\ChatRoom("Test");

        // act
        $actual->Create($chat1);
        $actual->Create($chat2);
        $actualChat = $actual->Read(0);

        //assert
        $this->assertEquals(1, $actual->Count());
        $this->assertEquals("Test", $actualChat->ChatName());
    }
}