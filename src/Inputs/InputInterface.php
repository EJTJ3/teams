<?php

declare(strict_types=1);

namespace EJTJ3\Teams\Inputs;

interface InputInterface
{
    public function getId(): string;

    public function getTitle(): string;

    public function toArray(): array;
}
