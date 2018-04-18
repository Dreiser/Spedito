<?php
declare(strict_types=1);

namespace Spedito\Model\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;

/**
 * Class Car
 * @package Spedito\Model\Entity
 * @ORM\Entity(repositoryClass="Spedito\Model\Repository\CarRepository\CarRepository")
 */
class Car
{
    use Identifier;

    /**
     * @ORM\Column(type="string", length=128)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=128)
     * @var string
     */
    private $manufacturer;

    /**
     * @ORM\Column(type="string", length=128)
     * @var string
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=24)
     * @var string
     */
    private $licensePlate;

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
     * @return Car
     */
    public function setId(int $id): Car
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
     * @return Car
     */
    public function setName(string $name): Car
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     *
     * @return Car
     */
    public function setManufacturer(string $manufacturer): Car
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     *
     * @return Car
     */
    public function setModel(string $model): Car
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @return string
     */
    public function getLicensePlate(): string
    {
        return $this->licensePlate;
    }

    /**
     * @param string $licensePlate
     *
     * @return Car
     */
    public function setLicensePlate(string $licensePlate): Car
    {
        $this->licensePlate = $licensePlate;

        return $this;
    }
}