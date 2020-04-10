<?php

declare(strict_types=1);

use EJTJ3\Teams\Card;
use EJTJ3\Teams\Client;

class ClientUnitTest extends PHPUnit\Framework\TestCase
{
    public function testInstantiation(): void
    {
        $client = $this->createClient();


        $this->assertSame('http://fake.endpoint', $client->getEndPoint());
    }

    private function createClient(): Client
    {
        return new Client('http://fake.endpoint');
    }
}
