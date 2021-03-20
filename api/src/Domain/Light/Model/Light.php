<?php

declare(strict_types=1);

namespace SmartHouse\Domain\Light\Model;

use Ramsey\Uuid\UuidInterface;

class Light
{
    private UuidInterface $id;

    private string $name;

    public function __construct(
        UuidInterface $id,
        string $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }
}