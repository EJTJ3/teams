<?php

declare(strict_types=1);

use EJTJ3\Teams\Inputs\Inputs;
use EJTJ3\Teams\Inputs\TextInput;
use PHPUnit\Framework\TestCase;

class TextInputUnitTest extends TestCase
{
    public function testInstantiation(): void
    {
        $input = $this->getInput();

        $this->assertSame('comment', $input->getId());
        $this->assertSame('Add a comment here for this task', $input->getTitle());
        $this->assertTrue($input->isMultiline());
    }

    public function testSetId(): void
    {
        $input = $this->getInput();

        $input->setId('newId');

        $this->assertSame('newId', $input->getId());
    }

    public function testTileId(): void
    {
        $input = $this->getInput();

        $input->setTitle('title');

        $this->assertSame('title', $input->getTitle());
    }

    public function testToArray(): void
    {
        $input = $this->getInput();

        $output = [
            '@type' => Inputs::TEXT_INPUT,
            'id' => 'comment',
            'isMultiline' => true,
            'title' => 'Add a comment here for this task',
        ];

        $this->assertSame($output, $input->toArray());
    }


    public function getInput(): TextInput
    {
        return new TextInput('comment', 'Add a comment here for this task', true);
    }
}
