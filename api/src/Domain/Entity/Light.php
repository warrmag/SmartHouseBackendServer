<?php
declare(strict_types=1);

namespace Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("app_light")
 * @ORM\Entity()
 */
class Light
{
    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="string", unique=true, length=36)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private string $uuid;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private string $type;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private string $ipAddress;

    /**
     * @var Room
     * @ORM\ManyToOne(targetEntity="Room", inversedBy="lightList")
     * @ORM\JoinColumn(name="room_uuid", referencedColumnName="uuid")
     */
    private Room $room;

    public function __construct(string $uuid, string $type, string $ipAddress, Room $room = null)
    {
        $this->uuid = $uuid;
        $this->type = $type;
        $this->ipAddress = $ipAddress;
        $this->room = $room;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    public function setRoom(Room $room): void
    {
        $this->room = $room;
    }

    public function getRoom(): ?Room
    {
        return $this->room;
    }
}
