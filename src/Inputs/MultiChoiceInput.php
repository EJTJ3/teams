<?php

declare(strict_types=1);

namespace EJTJ3\Teams\Inputs;

class MultiChoiceInput implements InputInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $isMultiSelect;

    /**
     * @var array
     */
    private $choices;

    public function __construct(string $id, string $title, bool $isMultiSelect = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->isMultiSelect = $isMultiSelect;
        $this->choices = [];
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

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getChoices(): array
    {
        return $this->choices;
    }

    public function addChoice(string $display, string $value): self
    {
        $this->choices[] = [
            'display' => $display,
            'value' => $value,
        ];

        return $this;
    }

    public function clearChoices(): self
    {
        $this->choices = [];

        return $this;
    }

    public function isMultiSelect(): bool
    {
        return $this->isMultiSelect;
    }

    public function setIsMultiSelect(bool $isMultiSelect): self
    {
        $this->isMultiSelect = $isMultiSelect;

        return $this;
    }

    public function toArray(): array
    {
        return [
            '@type' => Inputs::MULTI_CHOICE_INPUT,
            'id' => $this->id,
            'title' => $this->title,
            'isMultiSelect' => $this->isMultiSelect,
            'choices' => $this->choices,
        ];
    }
}
