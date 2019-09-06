<?php
declare(strict_types=1);

namespace Domain\DTO;

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

    public function __construct(string $email, string $plainPassword, ?array $roles, ?bool $active)
    {
        $this->email = $email;
        $this->plainPassword = $plainPassword;
        $this->roles = $roles;
        $this->active = $active;
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