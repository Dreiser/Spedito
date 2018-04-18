<?php
declare(strict_types=1);

namespace Spedito\Model\DTO;

use Spedito\Exceptions\Model\Validation\Entity\ShipmentValidationException;
use Spedito\Model\Entity\Customer;
use Spedito\Model\Entity\Shipment;

/**
 * Class Shipment
 * @package Spedito\Components\ShipmentForm\DTO
 */
final class ShipmentDTO
{
    /** @var int|null */
    private $id = null;

    /** @var int|null */
    private $customerId = null;

    /** @var string|null */
    private $number = null;

    /** @var TransportDTO[] */
    private $transports = [];

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return ShipmentDTO
     */
    public function setId(int $id): ShipmentDTO
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * @param int|null $customerId
     *
     * @return ShipmentDTO
     */
    public function setCustomerId(?int $customerId): ShipmentDTO
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param null|string $number
     *
     * @return ShipmentDTO
     */
    public function setNumber(?string $number): ShipmentDTO
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return TransportDTO[]
     */
    public function getTransports(): array
    {
        return $this->transports;
    }

    /**
     * @param TransportDTO $transport
     *
     * @return ShipmentDTO
     */
    public function addTransport(TransportDTO $transport): ShipmentDTO
    {
        $this->transports[] = $transport;

        return $this;
    }
}
