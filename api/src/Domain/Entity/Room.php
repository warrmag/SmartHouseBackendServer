<?php
declare(strict_types=1);

namespace Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("app_room")
 * @ORM\Entity()
 */
class Room
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
    private string $name;

    /**
     * @var House
     * @ORM\ManyToOne(targetEntity="House", inversedBy="roomList")
     * @ORM\JoinColumn(name="house_uuid", referencedColumnName="uuid")
     */
    private House $house;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Light", mappedBy="room")
     */
    private Collection $lightList;

    public function __construct(string $uuid, string $name, House $house)
    {
        $this->uuid = $uuid;
        $this->name = $name;
        $this->lightList = new ArrayCollection();

        $this->setHouse($house);
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function setHouse(House $house): void
    {
        $house->addRoom($this);
        $this->house = $house;
    }

    /**
     * @return House
     */
    public function getHouse(): House
    {
        return $this->house;
    }

    public function addLight(Light $light): void
    {
        if ($this->lightList->contains($light)) {
            return;
        }

        $light->setRoom($this);
        $this->lightList->add($light);
    }

    /**
     * @return Collection
     */
    public function getLightList(): Collection
    {
        return $this->lightList;
    }
}
