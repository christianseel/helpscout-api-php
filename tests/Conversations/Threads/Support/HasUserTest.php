<?php

declare(strict_types=1);

namespace HelpScout\Api\Tests\Conversations\Threads\Support;

use HelpScout\Api\Conversations\Threads\Support\HasUser;
use HelpScout\Api\Users\User;
use PHPUnit\Framework\TestCase;

class HasUserTest extends TestCase
{
    use HasUser;

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->userId = null;
    }

    public function testCanSetUserId()
    {
        $userId = 4839;
        $this->assertInstanceOf(self::class, $this->setUserId($userId));

        $this->assertEquals($userId, $this->getUserId());
    }

    public function testCanSetUser()
    {
        $userId = 4839;
        $user = new User();
        $user->setId($userId);

        $this->assertInstanceOf(self::class, $this->setUser($user));

        $this->assertEquals($userId, $this->getUserId());
    }
}
