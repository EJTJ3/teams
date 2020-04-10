<?php

declare(strict_types=1);

namespace EJTJ3\Teams\Inputs;

class TextInput implements InputInterface
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
    private $isMultiline;

    public function __construct(string $id, string $title, bool $isMultiline = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->isMultiline = $isMultiline;
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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function isMultiline(): bool
    {
        return $this->isMultiline;
    }

    public function setIsMultiline(bool $isMultiline): self
    {
        $this->isMultiline = $isMultiline;

        return $this;
    }

    public function toArray(): array
    {
        return [
            '@type' => Inputs::TEXT_INPUT,
            'id' => $this->id,
            'isMultiline' => $this->isMultiline,
            'title' => $this->title,
        ];
    }
}
