<?php
declare(strict_types=1);

namespace Spedito\Model\DTO;

/**
 * Class Transport
 * @package Spedito\Components\TransportForm\DTO
 */
final class TransportDTO
{
    /** @var int|null */
    private $id = null;

    /** @var int|null */
    private $shipmentId = null;

    /** @var string|null */
    private $pickupAddress = null;

    /** @var string|null */
    private $deliveryAddress = null;

    /** @var \DateTime|null */
    private $pickupDate = null;

    /** @var int|null */
    private $carId = null;

    /** @var int|null */
    private $driverId = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     *
     * @return TransportDTO
     */
    public function setId(?int $id): TransportDTO
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getShipmentId(): ?int
    {
        return $this->shipmentId;
    }

    /**
     * @param int|null $shipmentId
     *
     * @return TransportDTO
     */
    public function setShipmentId(?int $shipmentId): TransportDTO
    {
        $this->shipmentId = $shipmentId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getPickupAddress(): ?string
    {
        return $this->pickupAddress;
    }

    /**
     * @param null|string $pickupAddress
     *
     * @return TransportDTO
     */
    public function setPickupAddress(?string $pickupAddress): TransportDTO
    {
        $this->pickupAddress = $pickupAddress;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getDeliveryAddress(): ?string
    {
        return $this->deliveryAddress;
    }

    /**
     * @param null|string $deliveryAddress
     *
     * @return TransportDTO
     */
    public function setDeliveryAddress(?string $deliveryAddress): TransportDTO
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getPickupDate(): ?\DateTime
    {
        return $this->pickupDate;
    }

    /**
     * @param \DateTime|null $pickupDate
     *
     * @return TransportDTO
     */
    public function setPickupDate(?\DateTime $pickupDate): TransportDTO
    {
        $this->pickupDate = $pickupDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCarId(): ?int
    {
        return $this->carId;
    }

    /**
     * @param int|null $carId
     *
     * @return TransportDTO
     */
    public function setCarId(?int $carId): TransportDTO
    {
        $this->carId = $carId;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDriverId(): ?int
    {
        return $this->driverId;
    }

    /**
     * @param int|null $driverId
     *
     * @return TransportDTO
     */
    public function setDriverId(?int $driverId): TransportDTO
    {
        $this->driverId = $driverId;

        return $this;
    }
}
