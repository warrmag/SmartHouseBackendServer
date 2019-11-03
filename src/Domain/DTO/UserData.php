<?php
declare(strict_types=1);

namespace Domain\DTO;

use JMS\Serializer\Annotation as Serializer;

class UserData
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $plainPassword;
    /**
     * @var array|null
     */
    private $roles;
    /**
     * @var bool
     */
    private $active;
    /**
     * @var string
     * @Serializer\Type(string)
     */
    private $firstName;
    /**
     * @var string
     */
    private $lastName;

    public function __construct(
        string $email,
        string $firstName,
        string $lastName,
        string $plainPassword,
        ?array $roles,
        ?bool $active
    ) {
        $this->email = $email;
        $this->plainPassword = $plainPassword;
        $this->roles = $roles;
        $this->active = $active;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function email(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function plainPassword(): string
    {
        return $this->plainPassword;
    }

    /**
     * @return string
     */
    public function firstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function lastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return array|null
     */
    public function roles(): ?array
    {
        return $this->roles;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}