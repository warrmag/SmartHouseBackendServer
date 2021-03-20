<?php

declare(strict_types=1);

namespace SmartHouse\Tests\Unit\Domain\Geometry;

use PHPUnit\Framework\TestCase;
use SmartHouse\Domain\Geometry\Line;
use SmartHouse\Domain\Geometry\Polygon;
use SmartHouse\Domain\Geometry\Vector;

class PolygonTest extends TestCase
{
    public function testDrawingSimplePolygon(): void
    {
        $lines = $this->provideShapeData();
        $polygon = new Polygon($lines);
    }

    public function provideShapeData(): array
    {
        return [
                new Line(
                    new Vector(0, 0),
                    new Vector(10, 0)
                ),
                new Line(
                    new Vector(10, 0),
                    new Vector(10, 10)
                ),
                new Line(
                    new Vector(10, 10),
                    new Vector(0, 10)
                ),
                new Line(
                    new Vector(0, 10),
                    new Vector(0, 0)
                )
        ];
    }
}