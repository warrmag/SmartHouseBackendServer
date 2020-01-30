<?php
declare(strict_types=1);

namespace App\Application\Query\Device;

use App\Application\Query\QueryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class ListDeviceQueryHandler implements MessageHandlerInterface
{
    public function __construct()
    {
    }

    public function __invoke(QueryInterface $query)
    {

    }
}