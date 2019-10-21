<?php
declare(strict_types=1);

namespace Domain\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity()
 */
class User implements UserInterface, \Serializable
{
    const DEFAULT_ROLE = 'ROLE_USER';

    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="string", unique=true, length=36)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     * @Serializer\Groups({"client_view"})
     */
    private $uuid;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $password;

    /**
     * @var array
     * @ORM\Column(type="array", nullable=false)
     */
    private $roles;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false)
     */
    private $active;

    public function __construct(
        string $uuid,
        string $email,
        ?array $roles,
        ?bool $active
    ) {
        $this->uuid = $uuid;
        $this->email = $email;
        $this->roles = $roles ?? [self::DEFAULT_ROLE];
        $this->active = $active ?? false;
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