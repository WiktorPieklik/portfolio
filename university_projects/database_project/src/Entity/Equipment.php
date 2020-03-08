<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipmentRepository")
 */
class Equipment
{
    const STATUS_FREE = "status_free";
    const STATUS_OCCUPIED = "status_occupied";
    const STATUS_DAMAGED = "status_damaged";
    const STATUS_NEEDS_SERVICE = "status_needs_service";
    const STATUS_IN_SERVICE = "status_in_service";
    const STATUS_RESERVED = "status_reserved";
    const STATUS_UTILIZED = "status_utilized";
    const STATUS_IN_BASKET = "status_in_basket";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Department", inversedBy="equipments")
     */
    private $department;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     */
    private $milleage;

    /**
     * @ORM\Column(type="integer")
     */
    private $time_till_service; //given in hours

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\EquipmentCategory", inversedBy="equipments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\OrderT", mappedBy="equipments")
     */
    private $orders;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\DamageReport", mappedBy="equipments")
     */
    private $damageReports;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TransportOrder", mappedBy="equipments")
     */
    private $transportOrders;

    public function __construct()
    {
        $this->status = self::STATUS_FREE;
        $this->orders = new ArrayCollection();
        $this->damageReports = new ArrayCollection();
        $this->transportOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getMilleage(): ?float
    {
        return $this->milleage;
    }

    public function setMilleage(float $milleage): self
    {
        $this->milleage = $milleage;

        return $this;
    }

    public function getTimeTillService(): ?int
    {
        return $this->time_till_service;
    }

    public function setTimeTillService(?int $time_till_service): self
    {
        $this->time_till_service = $time_till_service;
        if($time_till_service <= 0)
        {
            $this->status = self::STATUS_NEEDS_SERVICE;
        }

        return $this;
    }

    public function getType(): ?EquipmentCategory
    {
        return $this->type;
    }

    public function setType(?EquipmentCategory $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection|OrderT[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(OrderT $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->addEquipment($this);
        }

        return $this;
    }

    public function removeOrder(OrderT $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            $order->removeEquipment($this);
        }

        return $this;
    }

    /**
     * @return Collection|DamageReport[]
     */
    public function getDamageReports(): Collection
    {
        return $this->damageReports;
    }

    public function addDamageReport(DamageReport $damageReport): self
    {
        if (!$this->damageReports->contains($damageReport)) {
            $this->damageReports[] = $damageReport;
            $damageReport->addEquipment($this);
        }

        return $this;
    }

    public function removeDamageReport(DamageReport $damageReport): self
    {
        if ($this->damageReports->contains($damageReport)) {
            $this->damageReports->removeElement($damageReport);
            $damageReport->removeEquipment($this);
        }

        return $this;
    }

    /**
     * @return Collection|TransportOrder[]
     */
    public function getTransportOrders(): Collection
    {
        return $this->transportOrders;
    }

    public function addTransportOrder(TransportOrder $transportOrder): self
    {
        if (!$this->transportOrders->contains($transportOrder)) {
            $this->transportOrders[] = $transportOrder;
            $transportOrder->addEquipment($this);
        }

        return $this;
    }

    public function removeTransportOrder(TransportOrder $transportOrder): self
    {
        if ($this->transportOrders->contains($transportOrder)) {
            $this->transportOrders->removeElement($transportOrder);
            $transportOrder->removeEquipment($this);
        }

        return $this;
    }
}
