<?php
declare(strict_types=1);

namespace Spedito\Model\Facade\ShipmentFacade;

use Spedito\Exceptions\SpeditoException;
use Spedito\Model\DTO\ShipmentDTO;
use Spedito\Model\Entity\Shipment;

/**
 * Interface IShipmentFacade
 * @package Spedito\Model\Facade
 */
interface IShipmentFacade
{
    /**
     * @param int $shipmentId
     *
     * @return null|Shipment
     */
    public function getById(int $shipmentId): ?Shipment;

    /**
     * @param ShipmentDTO $shipmentDTO
     *
     * @return Shipment
     *
     * @throws SpeditoException
     */
    public function save(ShipmentDTO $shipmentDTO): Shipment;
}