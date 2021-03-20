<?php
declare(strict_types=1);

namespace SmartHouse\Application\Query;

use SmartHouse\Application\Query\QueryInterface;

interface QueryHandlerInterface
{
    public function __invoke(QueryInterface $query);
}