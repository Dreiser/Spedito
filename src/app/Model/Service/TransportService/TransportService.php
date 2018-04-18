<?php
declare(strict_types=1);

namespace Spedito\Model\Service\TransportService;

use Doctrine\ORM\EntityManagerInterface;
use Spedito\Exceptions\Model\Entity\ShipmentNotFoundException;
use Spedito\Exceptions\SpeditoException;
use Spedito\Model\DTO\TransportDTO;
use Spedito\Model\Entity\Car;
use Spedito\Model\Entity\Driver;
use Spedito\Model\Entity\Shipment;
use Spedito\Model\Entity\Transport;
use Spedito\Model\Repository\TransportRepository\ITransportRepository;
use Spedito\Model\Validator\TransportValidator\ITransportValidator;

/**
 * Class TransportService
 * @package Spedito\Model\Service\TransportService
 */
final class TransportService implements ITransportService
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var ITransportRepository */
    private $transportRepository;

    /** @var ITransportValidator */
    private $transportValidator;

    /**
     * TransportService constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param ITransportRepository    $transportRepository
     * @param ITransportValidator     $transportValidator
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        ITransportRepository $transportRepository,
        ITransportValidator $transportValidator
    )
    {
        $this->entityManager = $entityManager;
        $this->transportRepository = $transportRepository;
        $this->transportValidator = $transportValidator;
    }

    /**
     * @param TransportDTO $transportDTO
     *
     * @return Transport
     *
     * @throws SpeditoException
     */
    public function create(TransportDTO $transportDTO): Transport
    {
        $this->transportValidator->validate($transportDTO);
        $transport = $this->getFromDTO($transportDTO);

        $this->entityManager->persist($transportDTO);
        $this->entityManager->flush();

        return $transport;
    }

    /**
     * @param TransportDTO $transportDTO
     *
     * @return Transport
     *
     * @throws SpeditoException
     */
    public function edit(TransportDTO $transportDTO): Transport
    {
        if ($transportDTO->getId() !== null) {
            if($this->transportRepository->idExists($transportDTO->getId()) === false) {
                throw new ShipmentNotFoundException();
            }
        }
        $this->transportValidator->validate($transportDTO);
        $transport = $this->getFromDTO($transportDTO);

        return $transport;
    }

    /**
     * @param TransportDTO $transportDTO
     *
     * @return Transport
     */
    private function getFromDTO(TransportDTO $transportDTO): Transport
    {
        $shipment = new Shipment();
        $shipment->setId($transportDTO->getShipmentId());
        $car = new Car();
        $car->setId($transportDTO->getCarId());
        $driver = new Driver();
        $driver->setId($transportDTO->getDriverId());
        $transport = new Transport();
        $transport->setShipment($shipment)
            ->setCar($car)
            ->setDriver($driver)
            ->setPickupAddress($transportDTO->getPickupAddress())
            ->setDeliveryAddress($transportDTO->getDeliveryAddress());

        return $transport;
    }
}