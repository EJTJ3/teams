<?php

declare(strict_types=1);

use EJTJ3\Teams\Section;

class SectionUnitTest extends \PHPUnit\Framework\TestCase
{
    public function testInstantiation(): void
    {
        $section = $this->getSection();

        $this->assertSame('Section title', $section->getActivityTitle());
    }

    public function testSetSubTitle(): void
    {
        $section = $this->getSection();

        $section->setActivitySubtitle('Adding a subtitle');

        $this->assertSame('Adding a subtitle', $section->getActivitySubtitle());
    }

    public function testSetText(): void
    {
        $section = $this->getSection();

        $section->setActivityText('Adding a new text');

        $this->assertSame('Adding a new text', $section->getActivityText());
    }

    public function testSetImage(): void
    {
        $section = $this->getSection();

        $section->setActivityImage('https://teamsnodesample.azurewebsites.net/static/img/image5.png');

        $this->assertSame('https://teamsnodesample.azurewebsites.net/static/img/image5.png', $section->getActivityImage());
    }

    public function testAddFact(): void
    {
        $section = $this->getSection();

        $section->addFact('DueDate', 'Tomorrow');

        $this->assertSame([
            'name' => 'DueDate',
            'value' => 'Tomorrow',
        ], $section->getFacts()[0]);
    }

    public function testClearFacts(): void
    {
        $section = $this->getSection();

        $section->addFact('DueDate', 'Tomorrow');

        $section->clearFacts();

        $this->assertSame([], $section->getFacts());
    }

    public function testToArray(): void
    {
        $section = $this->getSection();

        $section->addFact('DueDate', 'Tomorrow')
            ->setActivityImage('https://teamsnodesample.azurewebsites.net/static/img/image5.png')
            ->setActivityText('Adding a new text')
            ->setActivitySubtitle('Adding a subtitle');

        $expectedData = [
            'activityTitle' => 'Section title',
            'activitySubtitle' => 'Adding a subtitle',
            'activityText' => 'Adding a new text',
            'activityImage' => 'https://teamsnodesample.azurewebsites.net/static/img/image5.png',
            'facts' => [
                [
                    'name' => 'DueDate',
                    'value' => 'Tomorrow',
                ]
            ]
        ];

        $this->assertSame($expectedData, $section->toArray());

    }

    protected function getSection(): Section
    {
        return new Section('Section title');
    }
}