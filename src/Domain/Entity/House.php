<?php
declare(strict_types=1);

namespace Domain\Entity;

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
    private $uuid;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Domain\Entity\User", inversedBy="houses")
     * @ORM\JoinColumn(name="user_uuid", referencedColumnName="uuid")
     */
    private $user;

    /**
     * House constructor.
     * @param string $uuid
     * @param User $user
     */
    public function __construct(string $uuid, User $user)
    {
        $this->uuid = $uuid;
        $this->user = $user;
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
}