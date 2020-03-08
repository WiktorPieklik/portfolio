<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipmentCategoryRepository")
 */
class EquipmentCategory
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Equipment", mappedBy="type")
     */
    private $equipments;

    public function __construct()
    {
        $this->equipments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        switch($this->type)
        {
            case "ski":
                return "narty";
            case "helmet":
                return "kask";
            case "poles":
                return "kijki narciarskie";
            case "ski_boots":
                return "buty narciarskie";
            case "snowboard_boots":
                return "buty snowboardowe";
            default:
                return $this->type;
        }
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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
            $equipment->setType($this);
        }

        return $this;
    }

    public function removeEquipment(Equipment $equipment): self
    {
        if ($this->equipments->contains($equipment)) {
            $this->equipments->removeElement($equipment);
            // set the owning side to null (unless already changed)
            if ($equipment->getType() === $this) {
                $equipment->setType(null);
            }
        }

        return $this;
    }
}
