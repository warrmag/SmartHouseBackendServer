<?php
declare(strict_types=1);

namespace Domain\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table("app_house")
 * @ORM\Entity()
 */
class House
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
     * @var User
     * @ORM\ManyToOne(targetEntity="Domain\Entity\User", inversedBy="houses")
     * @ORM\JoinColumn(name="user_uuid", referencedColumnName="uuid")
     */
    private User $user;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Room", mappedBy="house")
     */
    private Collection $roomList;

    /**
     * House constructor.
     * @param string $uuid
     * @param User $user
     */
    public function __construct(string $uuid, User $user)
    {
        $this->uuid = $uuid;
        $this->user = $user;
        $this->roomList = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    public function addRoom(Room $room): void
    {
        if ($this->roomList->contains($room)) {
            return;
        }

        $this->roomList->add($room);
    }

    public function getRoomList(): Collection
    {
        return $this->roomList;
    }
}
