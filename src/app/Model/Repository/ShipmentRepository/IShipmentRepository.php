<?php
declare(strict_types=1);

namespace Spedito\Model\Repository\ShipmentRepository;

use Doctrine\Common\Persistence\ObjectRepository;
use Spedito\Model\Entity\Shipment;

/**
 * Interface IShipmentRepository
 * @package Spedito\Model\Repository
 */
interface IShipmentRepository extends ObjectRepository
{
    /**
     * @param int $shipmentId
     *
     * @return bool
     */
    public function idExists(int $shipmentId): bool;
}