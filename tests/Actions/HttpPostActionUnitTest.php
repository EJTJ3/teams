<?php

declare(strict_types=1);

use EJTJ3\Teams\Actions\ActionCard;
use EJTJ3\Teams\Actions\Actions;
use EJTJ3\Teams\Actions\HttpPostAction;
use PHPUnit\Framework\TestCase;

class HttpPostActionUnitTest extends TestCase
{
    public function testInstantiation(): void
    {
        $this->assertInstanceOf('EJTJ3\Teams\Actions\HttpPostAction', $this->getAction());
    }

    public function testSetName(): void
    {
        $action = $this->getAction();

        $action->setName('Hello world');

        $this->assertSame('Hello world', $action->getName());
    }

    public function testSetTarget(): void
    {
        $action = $this->getAction();

        $action->setTarget('https://test.com');

        $this->assertSame('https://test.com', $action->getTarget());
    }

    public function testToArray(): void
    {
        $action =  $this->getAction();

        $output = [
            '@type' => Actions::HTTP_POST_ACTION,
            'name' => 'name',
            'target' => 'https://...',
        ];

        $this->assertSame($output, $action->toArray());
    }

    protected function getAction(): HttpPostAction
    {
        return new HttpPostAction('name', 'https://...');
    }
}
