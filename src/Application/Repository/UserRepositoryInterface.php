<?php
declare(strict_types=1);

namespace Application\Repository;

use Domain\Entity\User;

interface UserRepositoryInterface
{
    public function findOne(): ?User;

    public function findAll(): array;

    public function save(User $user): void;

    public function update(User $user): void;

    public function delete(User $user): void;
}