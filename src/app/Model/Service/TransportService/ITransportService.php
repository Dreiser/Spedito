<?php
declare(strict_types=1);

namespace Spedito\Model\Service\TransportService;

use Spedito\Exceptions\Model\Entity\TransportNotFoundException;
use Spedito\Exceptions\Model\Validation\Entity\TransportValidationException;
use Spedito\Model\DTO\TransportDTO;
use Spedito\Model\Entity\Transport;

/**
 * Interface ITransportService
 * @package Spedito\Model\Service\TransportService
 */
interface ITransportService
{
    /**
     * @param TransportDTO $transportDTO
     *
     * @return Transport
     *
     * @throws TransportValidationException
     */
    public function create(TransportDTO $transportDTO): Transport;

    /**
     * @param TransportDTO $shipmentDTO
     *
     * @return Transport
     *
     * @throws TransportValidationException
     * @throws TransportNotFoundException
     */
    public function edit(TransportDTO $shipmentDTO): Transport;
}