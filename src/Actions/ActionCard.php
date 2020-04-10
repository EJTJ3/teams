<?php

declare(strict_types=1);

namespace EJTJ3\Teams\Actions;

use EJTJ3\Teams\Inputs\InputInterface;

class ActionCard implements ActionInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var InputInterface[]
     */
    private $inputs;

    /**
     * @var ActionInterface[]
     */
    private $actions;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->inputs = [];
        $this->actions = [];
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

    /**
     * @return ActionInterface[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }

    public function addAction(ActionInterface $action): self
    {
        $this->actions[] = $action;

        return $this;
    }

    public function clearActions(): self
    {
        $this->actions = [];

        return $this;
    }

    /**
     * @return InputInterface[]
     */
    public function getInputs(): array
    {
        return $this->inputs;
    }

    public function addInput(InputInterface $input): self
    {
        $this->inputs[] = $input;

        return $this;
    }

    public function clearInputs(): self
    {
        $this->inputs = [];

        return $this;
    }

    public function toArray(): array
    {
        return [
            '@type' => Actions::ACTION_CARD,
            'name' => $this->name,
            'inputs' => array_map(static function (InputInterface $input) {
                return $input->toArray();
            }, $this->inputs),
            'actions' => array_map(static function (ActionInterface $action) {
                return $action->toArray();
            }, $this->actions),
        ];
    }
}
