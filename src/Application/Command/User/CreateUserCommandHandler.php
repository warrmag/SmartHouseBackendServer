<?php
declare(strict_types=1);

namespace Application\Command\User;

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

    public function __construct(UserServiceInterface $userService, UserRepositoryInterface $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }

    /**
     * @param CommandInterface $command
     * @return string
     * @throws UnsupportedCommandException
     */
    public function __invoke(CommandInterface $command): string
    {
        if (!$command instanceof CreateUserCommand) {
            throw new UnsupportedCommandException(sprintf(
                'Command "%s" is not supported by "%s"',
                \get_class($command),
                __CLASS__
            ));
        }
        $user = $this->userService->create($command->uuid(), $command->payload());
        $this->userRepository->save($user);

        return $user->getUuid();
    }
}