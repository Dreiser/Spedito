<?php
declare(strict_types=1);


namespace Spedito\Model\Facade\TransportFacade;

use Spedito\Exceptions\SpeditoException;
use Spedito\Model\DTO\TransportDTO;
use Spedito\Model\Entity\Transport;

/**
 * Interface ITransportFacade
 * @package Spedito\Model\Facade
 */
interface ITransportFacade
{
    /**
     * @param TransportDTO $transportDTO
     *
     * @return Transport
     *
     * @throws SpeditoException
     */
    public function save(TransportDTO $transportDTO): Transport;
}