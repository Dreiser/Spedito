<?php
declare(strict_types=1);

namespace Spedito\Model\Validator\ShipmentValidator;

use Spedito\Exceptions\Model\Validation\Entity\ShipmentValidationException;
use Spedito\Model\DTO\ShipmentDTO;

/**
 * Class ShipmentValidator
 * @package Spedito\Model\Validator\ShipmentValidator
 */
final class ShipmentValidator implements IShipmentValidator
{
    /**
     * @param ShipmentDTO $shipmentDTO
     *
     * @throws ShipmentValidationException
     */
    public function validate(ShipmentDTO $shipmentDTO)
    {
        if($shipmentDTO->getCustomerId() === null) {
            throw new ShipmentValidationException("Shipment entity attribute \'customer_id\' can't be null");
        }
        if($shipmentDTO->getNumber() === null) {
            throw new ShipmentValidationException("Shipment entity attribute \'number\' can't be null");
        }
    }
}