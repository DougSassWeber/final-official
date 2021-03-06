<?php


class UserTest extends \Codeception\Test\Unit
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
    public function testCreateUser()
    {
        // arrange
        $actual = new \Storage\PluginMem();
        $user = new \Domain\USER("Test","Test@test.com");

        // act
        $actual->Create($user);
        $actualUser = $actual->Read(0);

        //assert
        $this->assertEquals(1, $actual->Count());
        $this->assertEquals("Test", $actualUser->Alias());
        $this->assertEqulas("Test@test.com", $actualUser->Email());
    }

    public function testDuplicateUser()
    {
        // arrange
        $actual = new \Storage\PluginMem();
        $user1 = new \Domain\USER("Test","Test@test.com");
        $user2 = new \Domain\USER("Test","Test@test.com");

        // act
        $actual->Create($user1);
        $actual->Create($user2);
        $actualUser = $actual->Read(0);

        //assert
        $this->assertEquals(1, $actual->Count());
        $this->assertEquals("Test", $actualUser->Alias());
        $this->assertEqulas("Test@test.com", $actualUser->Email());

    }
}