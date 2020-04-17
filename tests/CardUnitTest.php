<?php

declare(strict_types=1);

use EJTJ3\Teams\Actions\HttpPostAction;
use EJTJ3\Teams\Card;
use EJTJ3\Teams\Section;
use PHPUnit\Framework\TestCase;

class CardUnitTest extends TestCase
{
    public function testInstantiation(): void
    {
        $card = $this->getCard();

        $this->assertSame('Text', $card->getText());
    }

    public function testSetText(): void
    {
        $card = $this->getCard();

        $card->setText('new Text');

        $this->assertSame('new Text', $card->getText());
    }

    public function testSetTitle(): void
    {
        $card = $this->getCard();

        $card->setTitle('new Title');

        $this->assertSame('new Title', $card->getTitle());
    }

    public function testSetThemeColor(): void
    {
        $card = $this->getCard();

        $card->setThemeColor(Card::STATUS_SUCCESS);

        $this->assertSame(Card::STATUS_SUCCESS, $card->getThemeColor());
    }

    public function testAddSection(): void
    {
        $card = $this->getCard();

        $section = new Section('Test');

        $card->addSection($section);

        $this->assertSame($section, $card->getSections()[0]);
    }

    public function testAddingPotentialAction(): void
    {
        $card = $this->getCard();

        $action = new HttpPostAction('Test', 'https://...');

        $card->addPotentialAction($action);

        $this->assertSame($action, $card->getPotentialActions()[0]);
    }

    public function testToArray(): void
    {
        $card = (new Card('Larry Bryant created a new task'))
            ->setText('Yes, he did')
            ->setThemeColor(Card::STATUS_DEFAULT)
            ->setTitle('Adding Title to the card');

        $expectedData = [
            '@type' => 'MessageCard',
            'title' => 'Adding Title to the card',
            'themeColor' => Card::STATUS_DEFAULT,
            'text' => 'Yes, he did',
        ];

        $this->assertSame($expectedData, $card->preparePayload());
    }

    protected function getCard(): Card
    {
        return new Card('Text');
    }
}
