<?php

namespace App\Entity;

use App\Repository\CustomerStatusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 * The customers status - can be active or removed
 *
 * @ORM\Entity(repositoryClass=CustomerStatusRepository::class)
 * @ORM\Table(name="`customer_status`")
 *
 */
class CustomerStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="id")
     */
    private $customerStatusId;

    /**
     * @ORM\Column(type="string",length=2)
     * @var string $code the code of the customer status
     */
    private $code;

    /**
     * @ORM\Column(type="string",length=20)
     * @var string $name the name of the status
     */
    private $name;

    public function getCustomerStatusId(): ?int
    {
        return $this->customerStatusId;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
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
