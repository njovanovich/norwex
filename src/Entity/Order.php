<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * A customer order
 *
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`orders`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="id")
     */
    private $orderId;

    /**
     * @ORM\JoinColumn(name="customer_id")
     * @ORM\ManyToOne(targetEntity="Customer")
     * @var \App\Entity\Customer $customer The ordering customer
     */
    private $customer;

    /**
     * @ORM\Column(type="string",name="order_status",length=20)
     * @var string $orderStatus The status of the order
     */
    private $orderStatus;

    /**
     * @ORM\Column(type="float",name="order_total")
     * @var float $orderTotal Total of the order
     */
    private $orderTotal;

    /**
     * @ORM\Column(type="datetime",name="created")
     * @var \DateTime $createdDateTime datetime the order was created
     */
    private $createdDateTime;

    public function getOrderId(): ?int
    {
        return $this->orderId;
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
     */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return string
     */
    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }

    /**
     * @param string $orderStatus
     */
    public function setOrderStatus(string $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * @return float
     */
    public function getOrderTotal(): float
    {
        return $this->orderTotal;
    }

    /**
     * @param float $orderTotal
     */
    public function setOrderTotal(float $orderTotal): void
    {
        $this->orderTotal = $orderTotal;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDateTime(): \DateTime
    {
        return $this->createdDateTime;
    }

    /**
     * @param \DateTime $createdDateTime
     */
    public function setCreatedDateTime(\DateTime $createdDateTime): void
    {
        $this->createdDateTime = $createdDateTime;
    }

}
