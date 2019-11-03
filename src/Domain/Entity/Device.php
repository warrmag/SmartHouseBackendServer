<?php
declare(strict_types=1);

namespace Domain\Entity;

use App\Domain\Entity\EntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Device implements EntityInterface
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
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $name;

    public function __construct(string $uuid, string $name)
    {
        $this->uuid = $uuid;
        $this->name = $name;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }
}