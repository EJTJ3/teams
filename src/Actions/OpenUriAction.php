<?php

declare(strict_types=1);

namespace EJTJ3\Teams\Actions;

class OpenUriAction implements ActionInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $target;

    public function __construct(string $name, string $target)
    {
        $this->name = $name;
        $this->target = $target;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTarget(): string
    {
        return $this->target;
    }

    public function setTarget(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    public function toArray(): array
    {
        return [
            '@type' => Actions::OPEN_URI_ACTION,
            'name' => $this->name,
            'target' => $this->target,
        ];
    }
}
