<?php
declare(strict_types=1);

namespace Infrastructure\Repository\ORM;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\ORMException;
use Domain\Entity\User;
use Application\Repository\UserRepositoryInterface;
use Infrastructure\Repository\RepositoryException;
use Psr\Log\LoggerInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class UserRepository extends ServiceEntityRepository implements UserRepositoryInterface, UserLoaderInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(ManagerRegistry $registry, LoggerInterface $logger)
    {
        parent::__construct($registry, User::class);
        $this->entityManager = $this->getEntityManager();
        $this->logger = $logger;
    }

    /**
     * Loads the user for the given username.
     *
     * This method must return null if the user is not found.
     * @param string $username The username
     * @return UserInterface|null
     * @throws RepositoryException
     */
    public function loadUserByUsername($username)
    {
        $queryBuilder = $this->createQueryBuilder('u');
        $queryBuilder->orWhere('u.email = :email');
        $queryBuilder->setParameter('email', $username);

        try {
            $user = $queryBuilder->getQuery()->getOneOrNullResult();
        } catch (NonUniqueResultException $exception) {
            throw new RepositoryException($exception->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return $user;
    }

    public function findOne(): ?User
    {
        // TODO: Implement findOne() method.
    }

    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    /**
     * @param User $user
     * @throws RepositoryException
     */
    public function save(User $user): void
    {
        try {
            $this->entityManager->persist($user);
            $this->entityManager->flush($user);
        } catch (ORMException $exception) {
            $this->logger->emergency($exception->getMessage());
            throw new RepositoryException($exception->getMessage());
        }
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
