<?php

declare(strict_types=1);

namespace SmartHouse\Domain\Home\Model;

use SmartHouse\Domain\Geometry\SurfaceInterface;

class Room
{
    private SurfaceInterface $surface;

    public function __construct(SurfaceInterface $surface)
    {
        $this->surface = $surface;
    }
}