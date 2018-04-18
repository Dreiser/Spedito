<?php
declare(strict_types=1);

namespace Spedito\Model\Facade\ShipmentFacade;

use Spedito\Exceptions\SpeditoException;
use Spedito\Model\DTO\ShipmentDTO;
use Spedito\Model\Entity\Shipment;
use Spedito\Model\Repository\ShipmentRepository\IShipmentRepository;
use Spedito\Model\Service\ShipmentService\IShipmentService;

/**
 * Class ShipmentFacade
 * @package Spedito\Model\Facade
 */
final class ShipmentFacade implements IShipmentFacade
{
    /** @var IShipmentRepository */
    private $shipmentRepository;

    /** @var IShipmentService */
    private $shipmentService;

    /**
     * ShipmentFacade constructor.
     *
     * @param IShipmentRepository $shipmentRepository
     * @param IShipmentService    $shipmentService
     */
    public function __construct(
        IShipmentRepository $shipmentRepository,
        IShipmentService $shipmentService
    )
    {
        $this->shipmentRepository = $shipmentRepository;
        $this->shipmentService = $shipmentService;
    }

    /**
     * @param int $shipmentId
     *
     * @return null|Shipment
     */
    public function getById(int $shipmentId): ?Shipment
    {
        /** @var Shipment|null $shipment */
        $shipment = $this->shipmentRepository->find($shipmentId);
        return $shipment;
    }

    /**
     * @param ShipmentDTO $shipmentDTO
     *
     * @return Shipment
     *
     * @throws SpeditoException
     */
    public function save(ShipmentDTO $shipmentDTO): Shipment
    {
        return $this->shipmentService->create($shipmentDTO);
    }
}