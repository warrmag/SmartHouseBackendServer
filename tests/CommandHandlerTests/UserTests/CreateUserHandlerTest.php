<?php
declare(strict_types=1);

namespace Tests\CommandHandlerTests\UserTests;

use Application\Command\User\CreateUserCommand;
use Application\Command\User\CreateUserCommandHandler;
use Application\Service\User\UserService;
use Domain\DTO\UserData;
use Infrastructure\Repository\UserRepository;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CreateUserHandlerTest extends WebTestCase
{
    /**
     * @var CreateUserCommandHandler
     */
    private $createHandler;

    private $userData;

    protected function setUp(): void
    {
        $this->createHandler = new CreateUserCommandHandler(
            $this->createMock(UserService::class),
            $this->createMock(UserRepository::class)
        );
        $this->userData = new UserData(
            'test@me.now',
            'password',
            ['role_admin'],
            true
        );
    }

    public function testHandlingUserSave()
    {
        $commnad = new CreateUserCommand(Uuid::uuid4()->toString(), $this->userData);
        $handler = $this->createHandler;
        $result = $handler($commnad);

        $this->assertTrue(is_string($result));
    }
}