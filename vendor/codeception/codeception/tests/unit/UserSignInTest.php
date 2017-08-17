<?php


class UserSignInTest extends \Codeception\Test\Unit
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
    public function testLogInRoom()
    {
        $signIn = new \Domain\UserSignIn();
        $signIn->SetChatRoomId($actualChat->ChatRoomId());
        $signIn->SetUserId($actualUser->UserId());
        $signIn->SetLoggedIn(1);

        // act
        $actual->Create($signIn);
        $actualSignIn = $actual->Read(0);

        //assert
        $this->assertEquals(1, $actual->Count());
        $this->assertEquals($actualChat->ChatRoomId(), $actualSignIn->ChatRoomId());
        $this->assertEqulas($actualUser->UserId(), $actualSignIn->UserId());
        $this->assertEquals(1, $actualSignIn->LoggedIn());
    }

    public function testDuplicateLogInRoom()
    {
        $signIn1 = new \Domain\UserSignIn();
        $signIn1->SetChatRoomId($actualChat->ChatRoomId());
        $signIn1->SetUserId($actualUser->UserId());
        $signIn1->SetLoggedIn(1);
        $signIn2 = new \Domain\UserSignIn();
        $signIn2->SetChatRoomId($actualChat->ChatRoomId());
        $signIn2->SetUserId($actualUser->UserId());
        $signIn2->SetLoggedIn(1);

        // act
        $actual->Create($signIn1);
        $actual->Create($signIn2);
        $actualSignIn = $actual->Read(0);

        //assert
        $this->assertEquals(1, $actual->Count());
        $this->assertEquals($actualChat->ChatRoomId(), $actualSignIn->ChatRoomId());
        $this->assertEqulas($actualUser->UserId(), $actualSignIn->UserId());
        $this->assertEquals(1, $actualSignIn->LoggedIn());
    }
}