<?php
declare(strict_types=1);

namespace Domain\Service\User;

use Domain\DTO\UserData;
use Domain\Entity\User;

interface UserServiceInterface
{
    public function create(string $uuid, UserData $userData): User;
    public function modify(UserData $userData, User $user): User;
    public function delete(User $user);
}