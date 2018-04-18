<?php
declare(strict_types = 1);

namespace Spedito\Components\TransportForm;

use Spedito\Model\Entity\Transport;

/**
 * Interface ITransportFormFactory
 * @package Spedito\Components\TransportForm
 */
interface ITransportFormFactory
{
    /**
     * @param Transport|null $transport
     *
     * @return TransportForm
     */
    public function create(Transport $transport = null): TransportForm;
}
