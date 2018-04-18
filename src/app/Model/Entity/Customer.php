<?php
declare(strict_types=1);

namespace Spedito\Model\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;

/**
 * Class Customer
 * @package Spedito\Model\Entity
 * @ORM\Entity(repositoryClass="Spedito\Model\Repository\CustomerRepository\CustomerRepository")
 */
class Customer
{
    use Identifier;

    /**
     * @ORM\Column(type="string", length=128, unique=true, nullable=false)
     * @var string
     */
    private $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Customer
     */
    public function setId(int $id): Customer
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Customer
     */
    public function setName(string $name): Customer
    {
        $this->name = $name;

        return $this;
    }
}