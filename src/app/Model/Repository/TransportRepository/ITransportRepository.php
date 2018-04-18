<?php
declare(strict_types=1);

namespace Spedito\Model\Repository\TransportRepository;

use Doctrine\Common\Persistence\ObjectRepository;
use Spedito\Model\Entity\Transport;

/**
 * Interface ITransportRepository
 * @package Spedito\Model\Repository\TransportRepository
 */
interface ITransportRepository extends ObjectRepository
{
    /**
     * @param int $transportId
     *
     * @return bool
     */
    public function idExists(int $transportId): bool;
}