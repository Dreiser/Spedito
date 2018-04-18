<?php
declare(strict_types=1);

namespace Spedito\Model\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Kdyby\Doctrine\Entities\Attributes\Identifier;

/**
 * Class Shipment
 * @package Spedito\Model\Entity
 * @ORM\Entity(repositoryClass="Spedito\Model\Repository\ShipmentRepository\ShipmentRepository")
 */
class Shipment
{
    use Identifier;

    /**
     * @ORM\ManyToOne(targetEntity="Customer", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * @var Customer
     */
    private $customer;

    /**
     * @ORM\Column(type="string", length=128, nullable=false)
     * @var string
     */
    private $number;

    /**
     * @ORM\OneToMany(targetEntity="Transport", mappedBy="shipment", cascade={"persist", "remove", "merge"}, fetch="EXTRA_LAZY", orphanRemoval=true)
     * @var ArrayCollection
     */
    private $transports;

    /**
     * Shipment constructor.
     */
    public function __construct()
    {
        $this->transports = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Shipment
     */
    public function setId(int $id): Shipment
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param Transport $transport
     *
     * @return Shipment
     */
    public function addTransport(Transport $transport): Shipment
    {
        $this->transports->add($transport);

        return $this;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     *
     * @return Shipment
     */
    public function setCustomer(Customer $customer): Shipment
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     *
     * @return Shipment
     */
    public function setNumber(string $number): Shipment
    {
        $this->number = $number;

        return $this;
    }
}