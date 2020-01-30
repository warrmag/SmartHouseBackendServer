<?php
declare(strict_types=1);

namespace Application\Command\User;

use Application\Command\CommandInterface;
use Domain\DTO\UserData;
use Ramsey\Uuid\UuidInterface;

class CreateUserCommand implements CommandInterface
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var UserData
     */
    private $payload;

    public function __construct(string $uuid, UserData $data)
    {
        $this->payload = $data;
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function uuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return UserData
     */
    public function payload(): UserData
    {
        return $this->payload;
    }
}