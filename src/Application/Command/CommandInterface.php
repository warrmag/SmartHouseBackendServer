<?php
declare(strict_types=1);

namespace Application\Command;

interface CommandInterface
{
    public function payload();
}