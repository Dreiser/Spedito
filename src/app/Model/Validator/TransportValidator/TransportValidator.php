<?php
declare(strict_types=1);

namespace Spedito\Model\Validator\TransportValidator;

use Spedito\Exceptions\Model\Validation\Entity\TransportValidationException;
use Spedito\Model\DTO\TransportDTO;

/**
 * Class TransportValidator
 * @package Spedito\Model\Validator\TransportValidator
 */
class TransportValidator implements ITransportValidator
{
    /**
     * @param TransportDTO $transportDTO
     *
     * @throws TransportValidationException
     */
    public function validate(TransportDTO $transportDTO)
    {
        if ($transportDTO->getCarId() === null) {
            throw new TransportValidationException("Entity 'Transport' attribute 'car' can't be null");
        }
        if ($transportDTO->getDriverId() === null) {
            throw new TransportValidationException("Entity 'Transport' attribute 'driver' can't be null");
        }
        if ($transportDTO->getPickupAddress() === null) {
            throw new TransportValidationException("Entity 'Transport' attribute 'pickup_address' can't be null");
        }
        if ($transportDTO->getDeliveryAddress() === null) {
            throw new TransportValidationException("Entity 'Transport' attribute 'delivery_address' can't be null");
        }
        if ($transportDTO->getPickupDate() === null) {
            throw new TransportValidationException("Entity 'Transport' attribute 'pickup_date' can't be null");
        }
    }
}