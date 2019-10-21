<?php
declare(strict_types=1);

namespace Application\Command\User;

use App\Infrastructure\Validator\ValidatorInterface;
use Application\Command\CommandInterface;
use Application\Command\UnsupportedCommandException;
use Application\Service\User\UserServiceInterface;
use Application\Repository\UserRepositoryInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateUserCommandHandler implements MessageHandlerInterface
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function __construct(
        UserServiceInterface $userService,
        ValidatorInterface $validator,
        UserRepositoryInterface $userRepository
    ) {
        $this->userService = $userService;
        $this->validator = $validator;
        $this->userRepository = $userRepository;
    }

    /**
     * @param CreateUserCommand $command
     * @return string
     */
    public function __invoke(CreateUserCommand $command): string
    {
        $user = $this->userService->create($command->uuid(), $command->payload());
        $this->validator->validate($user);
        $this->userRepository->save($user);

        return $user->getUuid();
    }
}