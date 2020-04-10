<?php

declare(strict_types=1);

namespace EJTJ3\Teams\Actions;

interface ActionInterface
{
    public function getName(): string;

    public function toArray(): array;
}
