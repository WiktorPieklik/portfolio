<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    const ROLE_USER = "role_user";
    const ROLE_SERVICEMAN = "role_serviceman";
    const ROLE_DIRECTOR = "role_director";
    const ROLE_BOSS = "role_boss";
    const ROLE_VISITOR = "role_visitor";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Department", mappedBy="manager")
     */
    private $department;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $department_id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *     message = "Musisz podać nazwę użytkownika!"
     * )
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(
     *     message="Musisz podać adres email!"
     * )
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *     message="Musisz podać hasło!"
     * )
     * @Assert\Length(
     *     min=6,
     *     minMessage="Hasło musi się składać z 6 znaków!"
     * )
     * @Assert\Regex(
     *     pattern="/\d/m",
     *     message="Hasło musi zawierać co najmniej jedną cyfrę!"
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     *     message="Musisz podać nr karty kredytowej!"
     *     )
     */
    private $credit_card_number;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TransportOrder", mappedBy="user")
     */
    private $serviceman;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DamageReport", mappedBy="serviceman")
     */
    private $damageReports;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\OrderT", mappedBy="user")
     */
    private $orders;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Notification", mappedBy="user")
     */
    private $notifications;


    public function __construct()
    {
        $this->roles = self::ROLE_USER;

        $this->department = new ArrayCollection();
        $this->serviceman = new ArrayCollection();
        $this->damageReports = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->notifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Department[]
     */
    public function getDepartment(): Collection
    {
        return $this->department;
    }

    public function addDepartment(Department $department): self
    {
        if (!$this->department->contains($department)) {
            $this->department[] = $department;
            $department->setManager($this);
        }

        return $this;
    }

    public function removeDepartment(Department $department): self
    {
        if ($this->department->contains($department)) {
            $this->department->removeElement($department);
            // set the owning side to null (unless already changed)
            if ($department->getManager() === $this) {
                $department->setManager(null);
            }
        }

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        return [$this->roles];
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getDepartmentID(): ?int
    {
        return $this->department_id;
    }

    public function setDepartmentID(int $departmentID): self
    {
        $this->department_id = $departmentID;

        return $this;
    }

    public function getCreditCardNumber(): ?string
    {
        return $this->credit_card_number;
    }

    public function setCreditCardNumber(string $credit_card_number): self
    {
        $this->credit_card_number = $credit_card_number;

        return $this;
    }

    /**
     * @return Collection|TransportOrder[]
     */
    public function getServiceman(): Collection
    {
        return $this->serviceman;
    }

    public function addServiceman(TransportOrder $serviceman): self
    {
        if (!$this->serviceman->contains($serviceman)) {
            $this->serviceman[] = $serviceman;
            $serviceman->setUser($this);
        }

        return $this;
    }

    public function removeServiceman(TransportOrder $serviceman): self
    {
        if ($this->serviceman->contains($serviceman)) {
            $this->serviceman->removeElement($serviceman);
            // set the owning side to null (unless already changed)
            if ($serviceman->getUser() === $this) {
                $serviceman->setUser(null);
            }
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
            $damageReport->setUser($this);
        }

        return $this;
    }

    public function removeDamageReport(DamageReport $damageReport): self
    {
        if ($this->damageReports->contains($damageReport)) {
            $this->damageReports->removeElement($damageReport);
            // set the owning side to null (unless already changed)
            if ($damageReport->getUser() === $this) {
                $damageReport->setUser(null);
            }
        }

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
            $order->setUser($this);
        }

        return $this;
    }

    public function removeOrder(OrderT $order): self
    {
        if ($this->orders->contains($order)) {
            $this->orders->removeElement($order);
            // set the owning side to null (unless already changed)
            if ($order->getUser() === $this) {
                $order->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Notification[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(Notification $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setUser($this);
        }

        return $this;
    }

    public function removeNotification(Notification $notification): self
    {
        if ($this->notifications->contains($notification)) {
            $this->notifications->removeElement($notification);
            // set the owning side to null (unless already changed)
            if ($notification->getUser() === $this) {
                $notification->setUser(null);
            }
        }

        return $this;
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
