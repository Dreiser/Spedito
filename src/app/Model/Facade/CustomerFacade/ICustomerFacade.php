<?php
declare(strict_types=1);

namespace Spedito\Model\Facade\CustomerFacade;

use Spedito\Model\Entity\Customer;

/**
 * Interface ICustomerFacade
 * @package Spedito\Model\Facade\CustomerFacade
 */
interface ICustomerFacade
{
    /**
     * @return Customer[]
     */
    public function getAll(): array;
}