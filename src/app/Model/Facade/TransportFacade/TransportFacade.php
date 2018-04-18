<?php
declare(strict_types = 1);

namespace Spedito\Model\Facade\TransportFacade;

use Spedito\Exceptions\Model\Entity\TransportNotFoundException;
use Spedito\Exceptions\SpeditoException;
use Spedito\Model\DTO\TransportDTO;
use Spedito\Model\Entity\Transport;
use Spedito\Model\Repository\TransportRepository\ITransportRepository;
use Spedito\Model\Validator\TransportValidator\ITransportValidator;

/**
 * Class TransportFacade
 * @package Spedito\Model\Facade
 */
final class TransportFacade implements ITransportFacade
{
    /** @var ITransportValidator */
    private $transportValidator;

    /** @var ITransportRepository */
    private $transportRepository;

    /**
     * TransportFacade constructor.
     *
     * @param ITransportValidator  $transportValidator
     * @param ITransportRepository $transportRepository
     */
    public function __construct(
        ITransportValidator $transportValidator,
        ITransportRepository $transportRepository
    )
    {
        $this->transportValidator = $transportValidator;
        $this->transportRepository = $transportRepository;
    }

    /**
     * @param TransportDTO $transportDTO
     *
     * @return Transport
     *
     * @throws SpeditoException
     */
    public function save(TransportDTO $transportDTO): Transport
    {
        if ($transportDTO->getId() !== null) {
            if($this->transportRepository->idExists($transportDTO->getId()) === false) {
                throw new TransportNotFoundException();
            }
        }
        $this->transportValidator->validate($transportDTO);

        $transport = new Transport();
        return $transport;
    }
}
