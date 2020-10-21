<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * The customer
 *
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 * @ORM\Table(name="`customers`")
 *
 */
class Customer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="id")
     * @var integer $customerId
     */
    private $customerId;

    /**
     * @ORM\JoinColumn(name="status_id")
     * @ORM\ManyToOne(targetEntity="CustomerStatus")
     * @var \App\Entity\CustomerStatus $customerStatus the status of the customer
     */
    private $customerStatus;

    /**
     * @ORM\Column(type="string",length=255)
     * @var string $name name of the customer
     */
    private $name;

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    /**
     * @return \App\Entity\CustomerStatus
     */
    public function getCustomerStatus(): \App\Entity\CustomerStatus
    {
        return $this->customerStatus;
    }

    /**
     * @param \App\Entity\CustomerStatus $customerStatus
     */
    public function setCustomerStatus(\App\Entity\CustomerStatus $customerStatus): void
    {
        $this->customerStatus = $customerStatus;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}
