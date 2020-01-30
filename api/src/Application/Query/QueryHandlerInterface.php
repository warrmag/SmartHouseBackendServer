<?php
declare(strict_types=1);

namespace Application\Query;

use App\Application\Query\QueryInterface;

interface QueryHandlerInterface
{
    public function __invoke(QueryInterface $query);
}