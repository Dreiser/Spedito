<?php
declare(strict_types=1);

namespace Spedito\Model\Service\ShipmentService;

use Doctrine\ORM\EntityManagerInterface;
use Spedito\Exceptions\Model\Entity\ShipmentNotFoundException;
use Spedito\Exceptions\Model\Validation\Entity\ShipmentValidationException;
use Spedito\Model\DTO\ShipmentDTO;
use Spedito\Model\Entity\Customer;
use Spedito\Model\Entity\Shipment;
use Spedito\Model\Repository\CustomerRepository\ICustomerRepository;
use Spedito\Model\Repository\ShipmentRepository\IShipmentRepository;
use Spedito\Model\Validator\ShipmentValidator\IShipmentValidator;

/**
 * Class ShipmentService
 * @package Spedito\Model\Service\ShipmentService
 */
final class ShipmentService implements IShipmentService
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ICustomerRepository */
    private $customerRepository;

    /** @var IShipmentRepository */
    private $shipmentRepository;

    /** @var IShipmentValidator */
    private $shipmentValidator;

    /**
     * ShipmentService constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param ICustomerRepository    $customerRepository
     * @param IShipmentRepository       $shipmentRepository
     * @param IShipmentValidator        $shipmentValidator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        ICustomerRepository $customerRepository,
        IShipmentRepository $shipmentRepository,
        IShipmentValidator $shipmentValidator
    )
    {
        $this->entityManager = $entityManager;
        $this->customerRepository = $customerRepository;
        $this->shipmentRepository = $shipmentRepository;
        $this->shipmentValidator = $shipmentValidator;
    }

    /**
     * @param ShipmentDTO $shipmentDTO
     *
     * @return Shipment
     *
     * @throws ShipmentValidationException
     */
    public function create(ShipmentDTO $shipmentDTO): Shipment
    {
        $this->shipmentValidator->validate($shipmentDTO);
        $shipment = $this->getFromDTO($shipmentDTO);

        $this->entityManager->persist($shipment);
        $this->entityManager->flush();

        return $shipment;
    }

    /**
     * @param ShipmentDTO $shipmentDTO
     *
     * @return Shipment
     *
     * @throws ShipmentNotFoundException
     * @throws ShipmentValidationException
     */
    public function edit(ShipmentDTO $shipmentDTO): Shipment
    {
        if ($shipmentDTO->getId() !== null) {
            if($this->shipmentRepository->idExists($shipmentDTO->getId()) === false) {
                throw new ShipmentNotFoundException();
            }
        }
        $this->shipmentValidator->validate($shipmentDTO);
        $shipment = $this->getFromDTO($shipmentDTO);

        return $shipment;
    }

    /**
     * @param ShipmentDTO $shipmentDTO
     *
     * @return Shipment
     */
    private function getFromDTO(ShipmentDTO $shipmentDTO): Shipment
    {
        $customer = $this->customerRepository->find($shipmentDTO->getCustomerId());

        $shipment = new Shipment();
        $shipment->setCustomer($customer)
            ->setNumber($shipmentDTO->getNumber());

        return $shipment;
    }
}