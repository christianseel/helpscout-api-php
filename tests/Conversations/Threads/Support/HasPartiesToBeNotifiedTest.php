<?php

declare(strict_types=1);

namespace HelpScout\Api\Tests\Conversations\Threads\Support;

use HelpScout\Api\Conversations\Threads\Support\HasPartiesToBeNotified;
use PHPUnit\Framework\TestCase;

class HasPartiesToBeNotifiedTest extends TestCase
{
    use HasPartiesToBeNotified;

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->cc = [];
        $this->bcc = [];
    }

    public function testCanSetCCAndBCC()
    {
        $cc = [
            'tester@asdf234.com',
        ];

        $bcc = [
            'tester23@43jdf.com',
        ];

        $this->assertInstanceOf(self::class, $this->setCC($cc));
        $this->assertInstanceOf(self::class, $this->setBCC($bcc));

        $this->assertEquals($cc, $this->getCC());
        $this->assertEquals($bcc, $this->getBCC());
    }

    public function testCanHydrateCCAndBCCAsStrings()
    {
        $cc = 'tester@asdf234.com';
        $bcc = 'tester23@43jdf.com';

        $this->hydrateCC($cc);
        $this->hydrateBCC($bcc);

        $this->assertTrue(in_array($cc, $this->getCC()));
        $this->assertTrue(in_array($bcc, $this->getBCC()));
    }
}
