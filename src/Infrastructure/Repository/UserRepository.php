<?php
declare(strict_types=1);

namespace Infrastructure\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Domain\Entity\User;
use Domain\Repository\UserRepositoryInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface, UserLoaderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Loads the user for the given username.
     *
     * This method must return null if the user is not found.
     *
     * @param string $username The username
     *
     * @return UserInterface|null
     */
    public function loadUserByUsername($username)
    {
        // TODO: Implement loadUserByUsername() method.
    }

    public function findOne(): ?User
    {
        // TODO: Implement findOne() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function save(User $user): void
    {
        // TODO: Implement save() method.
    }

    public function update(User $user): void
    {
        // TODO: Implement update() method.
    }

    public function delete(User $user): void
    {
        // TODO: Implement delete() method.
    }
}