<?php
declare(strict_types=1);

namespace Domain\Entity;

use App\Domain\Entity\EntityInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table("app_user")
 * @ORM\Entity(repositoryClass="Infrastructure\Repository\ORM\UserRepository")
 */
class User implements UserInterface, EntityInterface, \Serializable
{
    public const DEFAULT_ROLE = 'ROLE_USER';

    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="string", unique=true, length=36)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     * @Serializer\Groups({"client_view"})
     */
    private string $uuid;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    private string $email;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private string $password;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private string $firstName;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private string $lastName;

    /**
     * @var array
     * @ORM\Column(type="array", nullable=false)
     */
    private ?array $roles;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false)
     */
    private ?bool $active;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Domain\Entity\House", mappedBy="user")
     */
    private Collection $houses;

    /**
     * User constructor.
     * @param string $uuid
     * @param string $email
     * @param string $firstName
     * @param string $lastName
     * @param array|null $roles
     * @param bool|null $active
     */
    public function __construct(
        string $uuid,
        string $email,
        string $firstName,
        string $lastName,
        ?array $roles,
        ?bool $active
    ) {
        $this->uuid = $uuid;
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->roles = $roles ?? [self::DEFAULT_ROLE];
        $this->active = $active ?? false;
        $this->houses = new ArrayCollection();
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
    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @param House $house
     */
    public function addHouse(House $house):void
    {
        if ($this->houses->contains($house) === false) {
            $this->houses->add($house);
        }
    }

    /**
     * @param House $house
     */
    public function removeHouse(House $house)
    {
        if ($this->houses->contains($house)) {
            $this->houses->removeElement($house);
        }
    }

    public function eraseCredentials()
    {
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize(): string
    {
        return serialize($this);
    }

    /**
     * @see \Serializable::unserialize()
     * @param $serialized
     * @return User
     */
    public function unserialize($serialized): self
    {
        return unserialize($serialized, ['allowed_classes' => self::class]);
    }

    /**
     * @return string|null The salt
     */
    public function getSalt(): ?string
    {
        return null;
    }
}
