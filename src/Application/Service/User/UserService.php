<?php
declare(strict_types=1);

namespace Application\Service\User;

use Exception;
use Domain\DTO\UserData;
use Domain\Entity\User;
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
     * @param string $uuid
     * @param UserData $userData
     * @return User
     */
    public function create(string $uuid, UserData $userData): User
    {
        $user = new User(
            $uuid,
            $userData->email(),
            $userData->firstName(),
            $userData->lastName(),
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