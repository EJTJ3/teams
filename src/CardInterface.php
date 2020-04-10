<?php

declare(strict_types=1);

namespace EJTJ3\Teams;

interface CardInterface
{
    public function preparePayload(): array;
}
