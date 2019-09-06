<?php
declare(strict_types=1);

namespace Application\CommandHandler;

use Application\Command\CommandInterface;
use Application\Command\User\CreateUserCommand;
use Application\Service\User\UserServiceInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateUserCommandHandler implements MessageHandlerInterface
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
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
        $user = $this->userService->create($command->payload());

        return $user->getUuid();
    }
}