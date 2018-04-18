<?php
declare(strict_types=1);

namespace Spedito\Model\Repository\ShipmentRepository;

use Kdyby\Doctrine\EntityRepository;
use Spedito\Model\Entity\Shipment;

/**
 * Class ShipmentRepository
 * @package Spedito\Model\Repository
 */
final class ShipmentRepository extends EntityRepository implements IShipmentRepository
{
    /**
     * @param int $shipmentId
     *
     * @return bool
     */
    public function idExists(int $shipmentId): bool
    {
        $row = $this->find($shipmentId);
        return ($row !== null);
    }
}