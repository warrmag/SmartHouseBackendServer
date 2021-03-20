<?php

declare(strict_types=1);


namespace SmartHouse\Domain\Geometry;


use JetBrains\PhpStorm\Pure;

class Vector
{
    private int $x;
    private int $y;
    private ?int $z;

    public function __construct(int $positionX, int $positionY, ?int $positionZ = null)
    {
        $this->x = $positionX;
        $this->y = $positionY;
        $this->z = $positionZ;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getZ(): ?int
    {
        return $this->z;
    }

    #[Pure]
    public function equals(Vector $vector): bool
    {
        return $this->x === $vector->getX() &&
            $this->y === $vector->getY() &&
            $this->z === $vector->getZ();
    }
}