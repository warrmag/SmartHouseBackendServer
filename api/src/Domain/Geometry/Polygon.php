<?php

declare(strict_types=1);

namespace SmartHouse\Domain\Geometry;

use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;

class Polygon extends Shape implements IteratorAggregate, SurfaceInterface
{
    private ArrayIterator $lines;

    public function __construct(array $lines)
    {
        $this->lines = new ArrayIterator();
        $this->draw($lines);
    }

    private function draw(array $lines): void
    {
        $this->lines->append(array_shift($lines));

        foreach ($lines as $key => $line) {
            if (!$line instanceof Line) {
                throw new InvalidArgumentException('Shape can be create only from lines');
            }

            $this->lines->append($line);
        }

        if(!$this->isClosed()) {
            throw new InvalidArgumentException('Shape is not closed properly');
        }
    }

    private function drawLine(Line $line)
    {
        $lines = clone $this->lines;
        /** @var Line $shapeLine */
        foreach ($lines as $key => $shapeLine) {
            if ($shapeLine->isTangentOnBeginning($line)) {
                dump('End or duplicate', $line, $shapeLine);
            }

//            if ($shapeLine->isTangentOnEnd($line)) {
//                dd('dasds end');
//            }

            $this->lines[$key + 1] = $line;
        }

        dd($shapeLine);
    }

    public function getIterator()
    {
        return $this->lines;
    }

    private function isClosed(): bool
    {
        $last = $this->lines->offsetGet($this->lines->count() - 1);
        $this->lines->rewind();

        return $last->isTangentOnEnd($this->lines->current());
    }

    public function jsonSerialize()
    {
        return [$this->lines];
    }
}