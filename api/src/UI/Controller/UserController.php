<?php
declare(strict_types=1);

namespace UI\Controller;

use Application\Command\User\CreateUserCommand;
use Domain\DTO\UserData;
use Domain\Entity\User;
use JMS\Serializer\SerializerInterface;
use Ramsey\Uuid\Uuid;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    use HandleTrait;

    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(MessageBusInterface $messageBus, SerializerInterface $serializer)
    {
        $this->messageBus = $messageBus;
        $this->serializer = $serializer;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function create(Request $request): JsonResponse
    {
        $uuid = Uuid::uuid4()->toString();

        $userData = $this->serializer->deserialize($request->getContent(), UserData::class, 'json');
        $this->messageBus->dispatch(new CreateUserCommand($uuid, $userData));

        return new JsonResponse(['uuid' => $uuid], Response::HTTP_ACCEPTED);
    }

    /**
     * @Route("/users/{id}", name="get_user", methods={"GET"})
     * @IsGranted("ROLE_USER")
     *
     * @param User $user
     * @return JsonResponse
     */
    public function getOne(User $user): JsonResponse
    {
        return new JsonResponse(
            $this->serializer->serialize($user, 'json'),
            Response::HTTP_OK
        );
    }
}