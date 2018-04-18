<?php
declare(strict_types=1);

namespace Spedito\Components\ShipmentForm;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use Spedito\Components\FileTemplateTrait;
use Spedito\Components\TransportForm\ITransportFormFactory;
use Spedito\Components\TransportForm\TransportContainer\TransportContainer;
use Spedito\Components\TransportForm\TransportFieldsForm\ITransportFieldsFormFactory;
use Spedito\Model\DTO\ShipmentDTO;
use Spedito\Model\Entity\Customer;
use Spedito\Model\Entity\Shipment;

/**
 * Class ShipmentForm
 * @package Spedito\Components\ShipmentForm
 */
final class ShipmentForm extends Control
{
    use FileTemplateTrait;

    /** @var ITransportFormFactory */
    private $transportFormFactory;

    /** @var Customer[] */
    private $customers = [];

    /** @var Shipment|null */
    private $shipment = null;

    /** @var callback[] */
    private $onFormSuccess = [];

    /**
     * ShipmentForm constructor.
     *
     * @param array                $customers
     * @param Shipment|null           $shipment
     * @param ITransportFormFactory $transportFormFactory
     */
    public function __construct(
        array $customers,
        Shipment $shipment = null,
        ITransportFormFactory $transportFormFactory
    )
    {
        parent::__construct();
        $this->customers = $customers;
        $this->shipment = $shipment;
        $this->transportFormFactory = $transportFormFactory;
    }

    /**
     * @param callable $onSuccessCallback
     *
     * @return ShipmentForm
     */
    public function onFormSuccess(callable $onSuccessCallback)
    {
        $this->onFormSuccess[] = $onSuccessCallback;

        return $this;
    }

    /**
     * @return Form
     */
    protected function createComponentForm(): Form
    {
        $form = new Form();

        $form->addGroup('Objednávka');

        $customersItems = [];
        foreach($this->customers as $customer) {
            $customersItems[$customer->getId()] = $customer->getName();
        }
        $form->addSelect('customer', 'Zákazník', $customersItems)
            ->setPrompt(' --- ')
            ->setRequired();

        $form->addText('number', 'Číslo objednávky')
            ->setRequired();

        $form->addGroup('Zakázka');
        $form->addComponent(new TransportContainer(), 'transport_zas');

        $form->addSubmit('save', 'Uložit');

        $form->onSuccess[] = function (Form $form, ArrayHash $values) {
            $shipmentDTO = $this->getShipmentDTO($values);
            foreach($this->onFormSuccess as $onFormSuccess) {
                call_user_func_array($onFormSuccess, [
                    $shipmentDTO
                ]);
            }
        };

        return $form;
    }

    /**
     * @param ArrayHash $values
     *
     * @return ShipmentDTO
     */
    private function getShipmentDTO(ArrayHash $values): ShipmentDTO
    {
        $shipmentDTO = new ShipmentDTO();
        if($this->shipment !== null) {
            $shipmentDTO->setId($this->shipment->getId());
        }
        $shipmentDTO->setCustomerId($values->customer)
            ->setNumber($values->number);
        return $shipmentDTO;
    }
}