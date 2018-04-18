<?php
declare(strict_types=1);

namespace Spedito\Model\Repository\TransportRepository;

use Kdyby\Doctrine\EntityRepository;
use Spedito\Model\Entity\Transport;

/**
 * Class TransportRepository
 * @package Spedito\Model\Repository\TransportRepository
 */
final class TransportRepository extends EntityRepository implements ITransportRepository
{
    /**
     * @param int $transportId
     *
     * @return bool
     */
    public function idExists(int $transportId): bool
    {
        $row = $this->find($transportId);
        return ($row !== null);
    }
}