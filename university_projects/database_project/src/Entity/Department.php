<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentRepository")
 */
class Department
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="department")
     */
    private $manager;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer")
     */
    private $slots_count;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Equipment", mappedBy="department")
     */
    private $equipments;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TransportOrder", mappedBy="fromDepartment")
     */
    private $startTransportOrder;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TransportOrder", mappedBy="toDepartment")
     */
    private $endTransportOrders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderT", mappedBy="startDepartment")
     */
    private $startOrders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderT", mappedBy="endDepartment")
     */
    private $endOrders;

    public function __construct()
    {
        $this->equipments = new ArrayCollection();
        $this->startTransportOrder = new ArrayCollection();
        $this->endTransportOrders = new ArrayCollection();
        $this->startOrders = new ArrayCollection();
        $this->endOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManager(): ?User
    {
        return $this->manager;
    }

    public function setManager(?User $manager): self
    {
        $this->manager = $manager;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getSlotsCount(): ?int
    {
        return $this->slots_count;
    }

    public function setSlotsCount(int $slots_count): self
    {
        $this->slots_count = $slots_count;

        return $this;
    }

    /**
     * @return Collection|Equipment[]
     */
    public function getEquipments(): Collection
    {
        return $this->equipments;
    }

    public function addEquipment(Equipment $equipment): self
    {
        if (!$this->equipments->contains($equipment)) {
            $this->equipments[] = $equipment;
            $equipment->setDepartment($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): self
    {
        if ($this->equipments->contains($equipment)) {
            $this->equipments->removeElement($equipment);
            // set the owning side to null (unless already changed)
            if ($equipment->getDepartment() === $this) {
                $equipment->setDepartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TransportOrder[]
     */
    public function getStartTransportOrder(): Collection
    {
        return $this->startTransportOrder;
    }

    public function addStartTransportOrder(TransportOrder $startTransportOrder): self
    {
        if (!$this->startTransportOrder->contains($startTransportOrder)) {
            $this->startTransportOrder[] = $startTransportOrder;
            $startTransportOrder->setFromDepartment($this);
        }

        return $this;
    }

    public function removeStartTransportOrder(TransportOrder $startTransportOrder): self
    {
        if ($this->startTransportOrder->contains($startTransportOrder)) {
            $this->startTransportOrder->removeElement($startTransportOrder);
            // set the owning side to null (unless already changed)
            if ($startTransportOrder->getFromDepartment() === $this) {
                $startTransportOrder->setFromDepartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TransportOrder[]
     */
    public function getEndTransportOrders(): Collection
    {
        return $this->endTransportOrders;
    }

    public function addEndTransportOrder(TransportOrder $endTransportOrder): self
    {
        if (!$this->endTransportOrders->contains($endTransportOrder)) {
            $this->endTransportOrders[] = $endTransportOrder;
            $endTransportOrder->setToDepartment($this);
        }

        return $this;
    }

    public function removeEndTransportOrder(TransportOrder $endTransportOrder): self
    {
        if ($this->endTransportOrders->contains($endTransportOrder)) {
            $this->endTransportOrders->removeElement($endTransportOrder);
            // set the owning side to null (unless already changed)
            if ($endTransportOrder->getToDepartment() === $this) {
                $endTransportOrder->setToDepartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OrderT[]
     */
    public function getStartOrders(): Collection
    {
        return $this->startOrders;
    }

    public function addStartOrder(OrderT $startOrder): self
    {
        if (!$this->startOrders->contains($startOrder)) {
            $this->startOrders[] = $startOrder;
            $startOrder->setStartDepartment($this);
        }

        return $this;
    }

    public function removeStartOrder(OrderT $startOrder): self
    {
        if ($this->startOrders->contains($startOrder)) {
            $this->startOrders->removeElement($startOrder);
            // set the owning side to null (unless already changed)
            if ($startOrder->getStartDepartment() === $this) {
                $startOrder->setStartDepartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|OrderT[]
     */
    public function getEndOrders(): Collection
    {
        return $this->endOrders;
    }

    public function addEndOrder(OrderT $endOrder): self
    {
        if (!$this->endOrders->contains($endOrder)) {
            $this->endOrders[] = $endOrder;
            $endOrder->setEndDepartment($this);
        }

        return $this;
    }

    public function removeEndOrder(OrderT $endOrder): self
    {
        if ($this->endOrders->contains($endOrder)) {
            $this->endOrders->removeElement($endOrder);
            // set the owning side to null (unless already changed)
            if ($endOrder->getEndDepartment() === $this) {
                $endOrder->setEndDepartment(null);
            }
        }

        return $this;
    }
}
