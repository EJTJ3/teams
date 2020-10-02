<?php

declare(strict_types=1);

namespace EJTJ3\Teams;

class Section
{
    /**
     * @var string
     */
    private $activityTitle;

    /**
     * @var string
     */
    private $activitySubtitle;

    /**
     * @var string|null
     */
    private $activityText;

    /**
     * @var string|null
     */
    private $activityImage;

    /**
     * @var array
     */
    private $facts;

    /**
     * @var bool
     */
    private $markDown;

    public function __construct(string $activityTitle)
    {
        $this->activityTitle = $activityTitle;
        $this->markDown = true;

        $this->facts = [];
    }

    public function isMarkdown(): bool
    {
        return $this->markDown;
    }

    public function setMarkDown(bool $markdown): self
    {
        $this->markDown = $markdown;

        return $this;
    }

    public function getActivityTitle(): string
    {
        return $this->activityTitle;
    }

    public function setActivityTitle(string $activityTitle): self
    {
        $this->activityTitle = $activityTitle;

        return $this;
    }

    public function getActivityImage(): ?string
    {
        return $this->activityImage;
    }

    public function setActivityImage(?string $activityImage): self
    {
        $this->activityImage = $activityImage;

        return $this;
    }

    public function getActivitySubtitle(): string
    {
        return $this->activitySubtitle;
    }

    public function setActivitySubtitle(string $activitySubtitle): self
    {
        $this->activitySubtitle = $activitySubtitle;

        return $this;
    }

    public function getActivityText(): ?string
    {
        return $this->activityText;
    }

    public function setActivityText(?string $activityText): self
    {
        $this->activityText = $activityText;

        return $this;
    }

    public function getFacts(): array
    {
        return $this->facts;
    }

    public function addFact(string $name, string $value): self
    {
        $this->facts[] = [
            'name' => $name,
            'value' => $value,
        ];

        return $this;
    }

    public function clearFacts(): self
    {
        $this->facts = [];

        return $this;
    }

    public function toArray(): array
    {
        $section = [
            'activityTitle' => $this->activityTitle,
            'markdown' => $this->markDown,
        ];

        if ($this->activitySubtitle !== null) {
            $section['activitySubtitle'] = $this->activitySubtitle;
        }

        if ($this->activityText !== null) {
            $section['activityText'] = $this->activityText;
        }

        if ($this->activityImage !== null) {
            $section['activityImage'] = $this->activityImage;
        }

        if (isset($this->facts)) {
            $section['facts'] = $this->facts;
        }
        
        return $section;
    }
}
