<?php
declare(strict_types=1);

namespace UI\Controller;

use Domain\Entity\House;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class DeviceController extends AbstractController
{
    use HandleTrait;

    /**
     * @var MessageBusInterface
     */
    private $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function list(): Response
    {
        return new JsonResponse(exec('whoami'));
    }

    public function attach(House $house, Request $request): Response
    {

    }
}