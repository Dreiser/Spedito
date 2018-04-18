<?php
declare(strict_types = 1);

namespace Spedito\Components\TransportForm;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Utils\ArrayHash;
use Spedito\Components\TransportForm\TransportContainer\TransportContainer;
use Spedito\Exceptions\SpeditoException;
use Spedito\Model\DTO\TransportDTO;
use Spedito\Model\Entity\Transport;
use Spedito\Model\Facade\TransportFacade\ITransportFacade;
use Tracy\Debugger;

/**
 * Class TransportForm
 * @package Spedito\Components\TransportForm
 */
final class TransportForm extends Control
{
    /** @var Transport|null */
    private $transport = null;

    /** @var ITransportFacade */
    private $transportFacade;

    /**
     * TransportForm constructor.
     *
     * @param Transport|null              $transport
     * @param ITransportFacade            $transportFacade
     */
    public function __construct(
        Transport $transport = null,
        ITransportFacade $transportFacade
    )
    {
        parent::__construct();
        $this->transport = $transport;
        $this->transportFacade = $transportFacade;
    }

    /**
     * @param string $name
     *
     * @return Form
     */
    protected function createComponentForm(string $name = null): Form
    {
        $form = new Form();

        $form->addGroup('Zásilka');
        $transportContainer = $form->addContainer('transport');
        $transportContainer->addComponent(new TransportContainer(), 'transport_z');
        /*$form->addText('trace', 'Trasa')
            ->setRequired();

        $form->addText('transport_number', 'Číslo zásilky')
            ->setRequired();

        $form->addText('invoice_number', 'Číslo faktury');

        $form->addInteger('km', 'Km');

        $form->addInteger('price', 'Cena')
            ->setRequired();*/

        $form->onSuccess[] = [$this, 'onFormSuccess'];

        return $form;
    }

    /**
     * @param Form      $form
     * @param ArrayHash $values
     */
    public function onFormSuccess(Form $form, ArrayHash $values)
    {
        $transportDTO = new TransportDTO();
        if ($this->transport !== null) {
            $transportDTO->setId($this->transport->getId());
        }
        try {
            $this->transportFacade->save($transportDTO);
        } catch(SpeditoException $speditoException) {
            Debugger::log($speditoException->getMessage());
            $form->addError($speditoException->getMessage());
        }
    }
}
