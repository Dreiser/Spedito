<?php
declare(strict_types=1);

namespace Spedito\Model\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;

/**
 * Class Driver
 * @package Spedito\Model\Entity
 * @ORM\Entity(repositoryClass="Spedito\Model\Repository\DriverRepository\DriverRepository")
 */
class Driver
{
    use Identifier;

    /**
     * @ORM\Column(type="string", length=32)
     * @var string
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=64)
     * @var string
     */
    private $lastname;

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
     * @return Driver
     */
    public function setId(int $id): Driver
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     *
     * @return Driver
     */
    public function setFirstname(string $firstname): Driver
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     *
     * @return Driver
     */
    public function setLastname(string $lastname): Driver
    {
        $this->lastname = $lastname;

        return $this;
    }
}