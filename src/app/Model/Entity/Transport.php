<?php
declare(strict_types=1);

namespace Spedito\Model\Entity;

use Doctrine\ORM\Mapping as ORM;
use Kdyby\Doctrine\Entities\Attributes\Identifier;

/**
 * Class Transport
 * @package Spedito\Model\Entity
 * @ORM\Entity(repositoryClass="Spedito\Model\Repository\TransportRepository\TransportRepository")
 */
class Transport
{
    use Identifier;

    /**
     * @ORM\ManyToOne(targetEntity="Shipment", inversedBy="transports", cascade={"all"}, fetch="EAGER")
     * @var Shipment
     */
    private $shipment;

    /**
     * @ORM\Column(type="string", length=512)
     * @var string
     */
    private $pickupAddress;

    /**
     * @ORM\Column(type="string", length=512)
     * @var string
     */
    private $deliveryAddress;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $pickupDate;

    /**
     * @ORM\ManyToOne(targetEntity="Car", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(name="car_id", referencedColumnName="id")
     * @var Car
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity="Driver", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(name="driver_id", referencedColumnName="id")
     * @var Driver
     */
    private $driver;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Shipment
     */
    public function getShipment(): Shipment
    {
        return $this->shipment;
    }

    /**
     * @param Shipment $shipment
     *
     * @return Transport
     */
    public function setShipment(Shipment $shipment): Transport
    {
        $this->shipment = $shipment;

        return $this;
    }

    /**
     * @return string
     */
    public function getPickupAddress(): string
    {
        return $this->pickupAddress;
    }

    /**
     * @param string $pickupAddress
     *
     * @return Transport
     */
    public function setPickupAddress(string $pickupAddress): Transport
    {
        $this->pickupAddress = $pickupAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress(): string
    {
        return $this->deliveryAddress;
    }

    /**
     * @param string $deliveryAddress
     *
     * @return Transport
     */
    public function setDeliveryAddress(string $deliveryAddress): Transport
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPickupDate(): \DateTime
    {
        return $this->pickupDate;
    }

    /**
     * @param \DateTime $pickupDate
     *
     * @return Transport
     */
    public function setPickupDate(\DateTime $pickupDate): Transport
    {
        $this->pickupDate = $pickupDate;

        return $this;
    }

    /**
     * @return Car
     */
    public function getCar(): Car
    {
        return $this->car;
    }

    /**
     * @param Car $car
     *
     * @return Transport
     */
    public function setCar(Car $car): Transport
    {
        $this->car = $car;

        return $this;
    }

    /**
     * @return Driver
     */
    public function getDriver(): Driver
    {
        return $this->driver;
    }

    /**
     * @param Driver $driver
     *
     * @return Transport
     */
    public function setDriver(Driver $driver): Transport
    {
        $this->driver = $driver;

        return $this;
    }
}