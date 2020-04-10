<?php

declare(strict_types=1);


use EJTJ3\Teams\Actions\Actions;
use EJTJ3\Teams\Actions\OpenUriAction;
use PHPUnit\Framework\TestCase;

class OpenUriActionUnitTest extends TestCase
{
    public function testInstantiation(): void
    {
        $this->assertInstanceOf(OpenUriAction::class, $this->getAction());
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
            '@type' => Actions::OPEN_URI_ACTION,
            'name' => 'name',
            'target' => 'https://...',
        ];

        $this->assertSame($output, $action->toArray());
    }

    protected function getAction(): OpenUriAction
    {
        return new OpenUriAction('name', 'https://...');
    }
}
