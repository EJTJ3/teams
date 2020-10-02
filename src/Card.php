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

    /**
     * @var bool
     */
    private $markDown;

    public function __construct(string $text)
    {
        $this->text = $text;
        $this->themeColor = self::STATUS_DEFAULT;
        $this->markDown = true;
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

    public function setMarkDown(bool $markdown): self
    {
        $this->markDown = $markdown;

        return $this;
    }

    public function preparePayload(): array
    {
        $payload = [
            '@type' => 'MessageCard',
            'title' => $this->title,
            'themeColor' => $this->themeColor,
            'text' => $this->text,
            'markDown' => $this->markDown,
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
