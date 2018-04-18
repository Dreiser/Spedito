<?php
declare(strict_types=1);

namespace Spedito\Model\Facade\CustomerFacade;

use Spedito\Model\Entity\Customer;
use Spedito\Model\Repository\CustomerRepository\ICustomerRepository;

/**
 * Class CustomerFacade
 * @package Spedito\Model\Facade\CustomerFacade
 */
final class CustomerFacade implements ICustomerFacade
{
    /** @var ICustomerRepository */
    private $customerRepository;

    /**
     * CustomerFacade constructor.
     *
     * @param ICustomerRepository $customerRepository
     */
    public function __construct(
        ICustomerRepository $customerRepository
    )
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @return Customer[]
     */
    public function getAll(): array
    {
        return $this->customerRepository->findAll();
    }
}