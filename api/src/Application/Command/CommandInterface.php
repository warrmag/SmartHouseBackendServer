<?php
declare(strict_types=1);

namespace SmartHouse\Application\Command;

interface CommandInterface
{
    public function payload();
}