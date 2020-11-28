<?php
declare(strict_types=1);

namespace Application\Query;

use Application\Query\QueryInterface;

interface QueryHandlerInterface
{
    public function __invoke(QueryInterface $query);
}