<?php
declare(strict_types=1);

namespace Application\Command\User;

use Application\Command\CommandInterface;
use Domain\DTO\UserData;

class CreateUserCommand implements CommandInterface
{
    /**
     * @var UserData
     */
    private $payload;

    public function __construct(UserData $data)
    {
        $this->payload = $data;
    }

    public function payload(): UserData
    {
        return $this->payload;
    }
}