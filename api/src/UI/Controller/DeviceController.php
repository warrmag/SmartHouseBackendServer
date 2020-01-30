<?php
declare(strict_types=1);

namespace UI\Controller;

use App\Application\Query\Device\ListDeviceQuery;
use Domain\Entity\Device;
use Domain\Entity\House;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class DeviceController extends AbstractController
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

    public function __construct(SerializerInterface $serializer, MessageBusInterface $messageBus)
    {
        $this->serializer = $serializer;
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/devices/{uuid}", name="find_one", methods={"GET"})
     * @param Device|null $device
     * @return Response
     */
    public function findOne(?Device $device): Response
    {
        if (null === $device) {
            throw new NotFoundHttpException('Device not found', null, Response::HTTP_NOT_FOUND);
        }

        return new Response($this->serializer->serialize($device, 'json'),Response::HTTP_OK);
    }

    /**
     * @Route("/devices", name="list_devices", methods={"GET"})
     * @param Request $request
     * @return Response
     */
    public function list(Request $request): Response
    {
        $deviceList = $this->handle(new ListDeviceQuery($request));

        return new Response($this->serializer->serialize($deviceList, 'json'), Response::HTTP_OK);
    }

    /**
     * @Route("/devices", name="attach_devices", methods={"POST"})
     * @param House $house
     * @param Request $request
     * @return Response
     */
    public function attach(House $house, Request $request): Response
    {

    }
}