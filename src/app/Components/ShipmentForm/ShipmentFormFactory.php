<?php
declare(strict_types=1);

namespace Spedito\Components\ShipmentForm;

use Spedito\Components\TransportForm\ITransportFormFactory;
use Spedito\Model\Entity\Customer;
use Spedito\Model\Entity\Shipment;
use Spedito\Model\Facade\CustomerFacade\ICustomerFacade;

/**
 * Class ShipmentFormFactory
 * @package Spedito\Components\ShipmentForm
 */
final class ShipmentFormFactory implements IShipmentFormFactory
{
    /** @var ICustomerFacade */
    private $customerFacade;

    /** @var ITransportFormFactory */
    private $transportFormFactory;

    /**
     * ShipmentFormFactory constructor.
     *
     * @param ICustomerFacade      $customerFacade
     * @param ITransportFormFactory $transportFormFactory
     */
    public function __construct(ICustomerFacade $customerFacade, ITransportFormFactory $transportFormFactory)
    {
        $this->customerFacade = $customerFacade;
        $this->transportFormFactory = $transportFormFactory;
    }
    
    /**
     * @param Shipment|null $shipment
     * @param Customer[]|null $customers
     *
     * @return ShipmentForm
     */
    public function create(Shipment $shipment = null, array $customers = null): ShipmentForm
    {
        if ($customers === null) {
            $customers = $this->customerFacade->getAll();
        }
        return new ShipmentForm($customers, $shipment, $this->transportFormFactory);
    }
}