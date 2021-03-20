<?php

declare(strict_types=1);

namespace SmartHouse\Domain\Geometry;

use JetBrains\PhpStorm\Pure;

class Line extends Shape
{
    public function __construct(private Vector $begin, private Vector $end, string $unit = 'cm'){}

    public function getStart(): Vector
    {
        return $this->begin;
    }

    public function getEnd(): Vector
    {
        return $this->end;
    }

    #[Pure]
    public function isTangentOnBeginning(Line $line): bool
    {
        return $this->begin->equals($line->getStart()) ||
            $this->begin->equals($line->getEnd());
    }

    #[Pure] //May not be required
    public function isTangentOnEnd(Line $line): bool
    {
        return $this->end->equals($line->getStart()) ||
            $this->end->equals($line->getEnd());
    }
}