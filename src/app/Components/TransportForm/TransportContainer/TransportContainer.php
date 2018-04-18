<?php
declare(strict_types=1);

namespace Spedito\Components\TransportForm\TransportContainer;

use Nette\Forms\Container;

/**
 * Class TransportContainer
 * @package Spedito\Components\TransportForm\TransportContainer
 */
final class TransportContainer extends Container
{
    /**
     * TransportContainer constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addText('pickup_address', 'Adresa nakládky')
            ->setRequired();
        $this->addText('delivery_address', 'Adresa vykládky')
            ->setRequired();

        $this->addText('transport_number', 'Číslo zásilky')
            ->setRequired();

        $this->addText('invoice_number', 'Číslo faktury');

        $this->addInteger('km', 'Km');

        $this->addInteger('price', 'Cena')
            ->setRequired();
    }
}