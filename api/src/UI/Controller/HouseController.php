<?php
declare(strict_types=1);

namespace UI\Controller;

use JMS\Serializer\SerializerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HouseController
 * @package UI\Controller
 */
class HouseController extends AbstractController
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

    /**
     * HouseController constructor.
     * @param SerializerInterface $serializer
     * @param MessageBusInterface $messageBus
     */
    public function __construct(SerializerInterface $serializer, MessageBusInterface $messageBus)
    {
        $this->serializer = $serializer;
        $this->messageBus = $messageBus;
    }

    /**
     * @Route("/houses", name="add house", methods={"POST"})
     * @IsGranted("ROLE_USER")
     *
     * @param Request $request
     * @return Response
     */
    public function add(Request $request): Response
    {

//        $this->messageBus->dispatch();
    }
}