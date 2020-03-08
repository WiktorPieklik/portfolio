<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 */
class OrderT
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Department", inversedBy="startOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $startDepartment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Department", inversedBy="endOrders")
     */
    private $endDepartment;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $reserved_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $finished_at;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $price;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipment", inversedBy="orders")
     */
    private $equipments;

    public function __construct()
    {
        $this->equipments = new ArrayCollection();
        $this->created_at = null;
        $this->finished_at = null;
        $this->reserved_at = null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?UserInterface $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStartDepartment(): ?Department
    {
        return $this->startDepartment;
    }

    public function setStartDepartment(?Department $startDepartment): self
    {
        $this->startDepartment = $startDepartment;

        return $this;
    }

    public function getEndDepartment(): ?Department
    {
        return $this->endDepartment;
    }

    public function setEndDepartment(?Department $endDepartment): self
    {
        $this->endDepartment = $endDepartment;

        return $this;
    }

    public function getcreated_at(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getreserved_at(): ?\DateTimeInterface
    {
        return $this->reserved_at;
    }

    public function setReservedAt(?\DateTimeInterface $reserved_at): self
    {
        $this->reserved_at = $reserved_at;

        return $this;
    }

    public function getfinished_at(): ?\DateTimeInterface
    {
        return $this->finished_at;
    }

    public function setFinishedAt(?\DateTimeInterface $finished_at): self
    {
        $this->finished_at = $finished_at;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

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
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): self
    {
        if ($this->equipments->contains($equipment)) {
            $this->equipments->removeElement($equipment);
        }

        return $this;
    }
}
