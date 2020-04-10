<?php

declare(strict_types=1);

namespace EJTJ3\Teams;

use EJTJ3\Teams\Actions\ActionInterface;

class Card implements CardInterface
{
    public const STATUS_SUCCESS = '01BC36';
    public const STATUS_DEFAULT = '0076D7';
    public const STATUS_FAILURE = 'FF0000';

    /**
     * @var string
     */
    private $themeColor;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $text;

    /**
     * @var Section[]
     */
    private $sections;

    /**
     * @var ActionInterface[]
     */
    private $potentialAction;

    public function __construct(string $summary)
    {
        $this->summary = $summary;
        $this->themeColor = self::STATUS_DEFAULT;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getThemeColor(): string
    {
        return $this->themeColor;
    }

    public function setThemeColor(string $themeColor): self
    {
        $this->themeColor = $themeColor;

        return $this;
    }

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Section[]
     */
    public function getSections(): array
    {
        return $this->sections;
    }

    public function addSection(Section $section): self
    {
        $this->sections[] = $section;

        return $this;
    }

    public function clearSections(): self
    {
        $this->sections = [];

        return $this;
    }

    /**
     * @return ActionInterface[]
     */
    public function getPotentialActions(): array
    {
        return $this->potentialAction;
    }

    public function addPotentialAction(ActionInterface $action): self
    {
        $this->potentialAction[] = $action;

        return $this;
    }

    public function preparePayload(): array
    {
        $payload = [
            '@type' => 'MessageCard',
            'title' => $this->title,
            'themeColor' => $this->themeColor,
            'text' => $this->text,
            'summary' => $this->summary,
        ];

        if (isset($this->sections)) {
            $sections = array_map(static function (Section $section) {
                return $section->toArray();
            }, $this->sections);

            $payload['sections'] = $sections;
        }
        if (isset($this->potentialAction)) {
            $actions = array_map(static function (ActionInterface $action) {
                return $action->toArray();
            }, $this->potentialAction);

            $payload['potentialAction'] = $actions;
        }

        return $payload;
    }
}
