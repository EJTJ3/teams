<?php

declare(strict_types=1);

namespace EJTJ3\Teams\Inputs;

class DateInput implements InputInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    public function __construct(string $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
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

    public function toArray(): array
    {
        return [
            '@type' => Inputs::DATE_INPUT,
            'id' => $this->id,
            'title' => $this->title,
        ];
    }
}
