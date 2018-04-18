<?php
declare(strict_types = 1);

namespace Spedito\Presenters;

use Nette\Application\UI\Presenter;
use Spedito\Components\ShipmentForm\IShipmentFormFactory;
use Spedito\Components\ShipmentForm\ShipmentForm;
use Spedito\Exceptions\SpeditoException;
use Spedito\Model\DTO\ShipmentDTO;
use Spedito\Model\Entity\Shipment;
use Spedito\Model\Facade\ShipmentFacade\IShipmentFacade;

/**
 * Class ShipmentPresenter
 * @package Spedito\Presenters
 */
final class ShipmentPresenter extends Presenter
{
    /** @var IShipmentFacade */
    private $shipmentFacade;

    /** @var IShipmentFormFactory */
    private $shipmentFormFactory;

    /**
     * ShipmentPresenter constructor.
     *
     * @param IShipmentFacade      $shipmentFacade
     * @param IShipmentFormFactory $shipmentFormFactory
     */
    public function __construct(
        IShipmentFacade $shipmentFacade,
        IShipmentFormFactory $shipmentFormFactory
    )
    {
        parent::__construct();
        $this->shipmentFacade = $shipmentFacade;
        $this->shipmentFormFactory = $shipmentFormFactory;
    }

    /**
     * Transports overview
     */
    public function actionDefault()
    {

    }

    /**
     * New transport
     */
    public function actionNew()
    {

    }

    /**
     * @param int $shipmentId
     */
    public function actionEdit(int $shipmentId)
    {
        $this->template->shipmentId = $shipmentId;
    }

    /**
     * @return ShipmentForm
     */
    protected function createComponentNewShipmentForm(): ShipmentForm
    {
        $shipmentForm = $this->shipmentFormFactory->create();
        $shipmentForm->onFormSuccess(function(ShipmentDTO $shipmentDTO) {
            try {
                $shipment = $this->shipmentFacade->save($shipmentDTO);
                $this->flashMessage('Objednávka uložena');
            } catch (SpeditoException $speditoException) {
                $this->flashMessage('Vyskytla se chyba. Opakujte prosím později.');
                $this->redirect('this');
                return;
            }
            $this->redirect('Shipment:edit', [$shipment->getId()]);
        });
        return $shipmentForm;
    }

    /**
     * @param int $shipmentId
     *
     * @return ShipmentForm
     */
    protected function createComponentEditShipmentForm(int $shipmentId): ShipmentForm
    {
        $shipment = $this->shipmentFacade->getById($shipmentId);
        $shipmentForm = $this->shipmentFormFactory->create($shipment);
        $shipmentForm->onFormSuccess(function(ShipmentDTO $shipmentDTO) {
            try {
                $this->shipmentFacade->save($shipmentDTO);
                $this->flashMessage('Objednávka uložena');
            } catch (SpeditoException $speditoException) {
                $this->flashMessage('Vyskytla se chyba. Opakujte prosím později.');
            }
            $this->redirect('this');
        });
        return $shipmentForm;
    }
}
