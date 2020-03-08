<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DamageReportRepository")
 */
class DamageReport
{
    const STATUS_DAMAGE_NOT_ASSIGNED = "status_damage_not_assigned";
    const STATUS_DAMAGE_IN_PROGRESS = "status_damage_in_progress";
    const STATUS_DAMAGE_FINISHED = "status_damage_finished";
    const STATUS_SERVICE_NOT_ASSIGNED = "status_service_not_assigned";
    const STATUS_SERVICE_IN_PROGRESS = "status_service_in_progress";
    const STATUS_SERVICE_FINISHED = "status_service_in_progress";
    const SERVICE_MESSAGE = "Wymagany przegląd (wygenerowano automatycznie)";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="damageReports")
     */
    private $serviceman;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\OrderT", cascade={"persist", "remove"})
     */
    private $attachedOrder;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipment", inversedBy="damageReports")
     */
    private $equipments;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function __construct()
    {
        $this->equipments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceman(): ?User
    {
        return $this->serviceman;
    }

    public function setServiceman(?User $serviceman): self
    {
        $this->serviceman = $serviceman;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

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

    public function getAttachedOrder(): ?OrderT
    {
        return $this->attachedOrder;
    }

    public function setAttachedOrder(OrderT $attachedOrder): self
    {
        $this->attachedOrder = $attachedOrder;

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

    public function setCreatedAt(\DateTimeInterface $date): self
    {
        $this->created_at = $date;

        return $this;
    }

    public function getcreated_at()
    {
        return $this->created_at;
    }
}
