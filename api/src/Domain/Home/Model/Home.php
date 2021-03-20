<?php

declare(strict_types=1);

namespace SmartHouse\Domain\Home\Model;

use Doctrine\Common\Collections\Collection;
use Ramsey\Uuid\UuidInterface;

class Home
{
    private UuidInterface $id;
    private Collection $floors;

    public function __construct(UuidInterface $id, Collection $floors)
    {
        $this->id = $id;
        $this->floors = $floors;
    }
}