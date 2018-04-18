<?php
declare(strict_types=1);

namespace Spedito\Components\ShipmentForm;

use Spedito\Model\Entity\Customer;
use Spedito\Model\Entity\Shipment;

/**
 * Interface IShipmentFormFactory
 * @package Spedito\Components\ShipmentForm
 */
interface IShipmentFormFactory
{
    /**
     * @param Shipment|null $shipment
     * @param Customer[] $customers
     *
     * @return ShipmentForm
     */
    public function create(Shipment $shipment = null, array $customers = null): ShipmentForm;
}