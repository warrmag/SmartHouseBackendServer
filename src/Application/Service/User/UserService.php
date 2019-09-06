<?php
declare(strict_types=1);

namespace Application\Service\User;

use Domain\DTO\UserData;
use Domain\Entity\User;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var PasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param UserData $userData
     * @return User
     * @throws \Exception
     */
    public function create(UserData $userData): User
    {
        $user = new User(
            Uuid::uuid4()->toString(),
            $userData->email(),
            $userData->roles(),
            $userData->isActive()
        );
        $user->setPassword($this->passwordEncoder->encodePassword($user, $userData->plainPassword()));

        return $user;
    }

    public function modify(UserData $userData, User $user): User
    {
        // TODO: Implement modify() method.
    }

    public function delete(User $user)
    {
        // TODO: Implement delete() method.
    }
}