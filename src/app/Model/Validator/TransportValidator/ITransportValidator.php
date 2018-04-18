<?php
declare(strict_types=1);

namespace Spedito\Model\Validator\TransportValidator;

use Spedito\Exceptions\Model\Validation\Entity\TransportValidationException;
use Spedito\Model\DTO\TransportDTO;

/**
 * Interface ITransportValidator
 * @package Spedito\Model\Validator\TransportValidator
 */
interface ITransportValidator
{
    /**
     * @param TransportDTO $transportDTO
     *
     * @throws TransportValidationException
     */
    public function validate(TransportDTO $transportDTO);
}