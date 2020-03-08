<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransportOrderRepository")
 */
class TransportOrder
{
    const STATUS_FREE = "status_free";
    const STATUS_IN_PROGRESS = "status_in_progress";
    const STATUS_FINISHED = "status_finished";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="serviceman")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Department", inversedBy="startTransportOrder")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fromDepartment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Department", inversedBy="endTransportOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $toDepartment;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $finished_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipment", inversedBy="transportOrders")
     */
    private $equipments;

    public function __construct()
    {
        $this->status = self::STATUS_FREE;
        $this->equipments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getFromDepartment(): ?Department
    {
        return $this->fromDepartment;
    }

    public function setFromDepartment(?Department $fromDepartment): self
    {
        $this->fromDepartment = $fromDepartment;

        return $this;
    }

    public function getToDepartment(): ?Department
    {
        return $this->toDepartment;
    }

    public function setToDepartment(?Department $toDepartment): self
    {
        $this->toDepartment = $toDepartment;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getFinishedAt(): ?\DateTimeInterface
    {
        return $this->finished_at;
    }

    public function setFinishedAt(?\DateTimeInterface $finished_at): self
    {
        $this->finished_at = $finished_at;

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
