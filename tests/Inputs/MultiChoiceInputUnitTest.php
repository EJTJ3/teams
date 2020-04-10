<?php

declare(strict_types=1);

use EJTJ3\Teams\Inputs\Inputs;
use EJTJ3\Teams\Inputs\MultiChoiceInput;
use PHPUnit\Framework\TestCase;

class MultiChoiceInputUnitTest extends TestCase
{
    public function testInstantiation(): void
    {
        $input = $this->getInput();

        $this->assertSame('list', $input->getId());
        $this->assertSame('Select a status', $input->getTitle());
        $this->assertTrue($input->isMultiSelect());
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

    public function testAddChoices(): void
    {
        $input = $this->getInput();

        $input->addChoice('In Progress', '2');
        $input->addChoice('Done', '3');

        $output = [
            [
                'display' => 'In Progress',
                'value' => '2',
            ],
            [
                'display' => 'Done',
                'value' => '3',
            ]
        ];

        $this->assertSame($output, $input->getChoices());
    }

    public function testToArray(): void
    {
        $input = $this->getInput();

        $output = [
            '@type' => Inputs::MULTI_CHOICE_INPUT,
            'id' => 'list',
            'title' => 'Select a status',
            'isMultiSelect' => true,
            'choices' => [],
        ];

        $this->assertSame($output, $input->toArray());
    }

    protected function getInput(): MultiChoiceInput
    {
        return new MultiChoiceInput('list', 'Select a status', true);
    }
}
