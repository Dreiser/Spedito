<?php
declare(strict_types=1);

namespace Spedito\Model\Validator\ShipmentValidator;

use Spedito\Exceptions\Model\Validation\Entity\ShipmentValidationException;
use Spedito\Model\DTO\ShipmentDTO;

/**
 * Interface IShipmentValidator
 * @package Spedito\Model\Validator\ShipmentValidator
 */
interface IShipmentValidator
{
    /**
     * @param ShipmentDTO $shipmentDTO
     *
     * @throws ShipmentValidationException
     */
    public function validate(ShipmentDTO $shipmentDTO);
}