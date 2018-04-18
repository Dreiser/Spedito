<?php
declare(strict_types=1);

namespace Spedito\Model\Service\ShipmentService;

use Spedito\Exceptions\Model\Entity\ShipmentNotFoundException;
use Spedito\Exceptions\Model\Validation\Entity\ShipmentValidationException;
use Spedito\Model\DTO\ShipmentDTO;
use Spedito\Model\Entity\Shipment;

/**
 * Interface IShipmentService
 * @package Spedito\Model\Service\ShipmentService
 */
interface IShipmentService
{
    /**
     * @param ShipmentDTO $shipmentDTO
     *
     * @return Shipment
     *
     * @throws ShipmentValidationException
     */
    public function create(ShipmentDTO $shipmentDTO): Shipment;

    /**
     * @param ShipmentDTO $shipmentDTO
     *
     * @return Shipment
     *
     * @throws ShipmentNotFoundException
     * @throws ShipmentValidationException
     */
    public function edit(ShipmentDTO $shipmentDTO): Shipment;
}