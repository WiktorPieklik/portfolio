<?php


namespace App\Twig;


use App\Common\Common;
use App\Entity\Basket;
use App\Entity\Department;
use App\Entity\Equipment;
use App\Entity\OrderT;
use App\Repository\BasketRepository;
use App\Repository\DamageReportRepository;
use App\Service\BasketDataService;
use App\Service\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class UserExtension extends AbstractExtension
{
    /** @var BasketRepository */
    private $basketRepo;

    /** @var BasketDataService */
    private $basketService;

    /** @var RouterInterface */
    private $router;

    /** @var UserService */
    private $userService;

    /** @var DamageReportRepository */
    private $damageRepo;

    public function __construct(EntityManagerInterface $entityManager, BasketDataService $basketService,
                                RouterInterface $router, UserService $userService, DamageReportRepository $damageRepo)
    {
        $this->basketRepo = $entityManager->getRepository(Basket::class);
        $this->basketService = $basketService;
        $this->router = $router;
        $this->userService = $userService;
        $this->damageRepo = $damageRepo;
    }

    public function getFunctions()
    {
        return array(
            new TwigFunction("isGranted", [$this, "isRoleGranted"]),
            new TwigFunction("getUserId", [$this, "getUserId"]),
            new TwigFunction("basketCount", [$this, "getBasketCount"]),
            new TwigFunction("isCurrentDepartment", function(string $address1)
            {
                $address2 = $this->getCurrentDepartmentAddr();
                if($address2 == null)
                {
                    return true;
                }
                else if($address1 == $address2)
                {
                    return true;
                }
                return false;
            }),
            new TwigFunction("redirect",function(string $url, array $params)
            {
                return (new RedirectResponse($this->router->generate($url, $params)))->send();
            }),
            new TwigFunction("availableDepartments", function(OrderT $order)
            {
                /** @var Department[] $departments */
                $departments = $this->userService->getFreeDepartments();
                $equipmentCount = count($order->getEquipments());
                $availableDepartments = [];
                foreach($departments as $department)
                {
                    $freeSlots = $this->userService->getFreeSlotsCountForDepartment($department);
                    if($freeSlots >= $equipmentCount)
                    {
                        $availableDepartments[] = $department;
                    }
                }
                return $availableDepartments;
            }),
            new TwigFunction("serviceReportsCount", [$this, "getServiceReportsCount"]),
            new TwigFunction("damageReportsCount", [$this, "getDamageReportsCount"]),
        );
    }

    public function isRoleGranted(string $role)
    {
        if(Common::getUser() != null)
        {
            if(Common::getUser()->getRoles()[0] == $role)
                return true;
        }
        return false;
    }

    public function getUserId()
    {
        return Common::getUser()->getId();
    }

    public function getBasketCount(): int
    {
        return $this->basketRepo->getUserBasketCount(Common::getUser());
    }

    /**
     * During reservation/making order user is allowed to choose only one department at the time
     * The others one should be faded
     */
    private function getCurrentDepartmentAddr()
    {
        if (Common::getUser() != null) {
            /** @var Equipment[] $equipments */
            $equipments = $this->basketService->getBasketEquipments();
            if (count($equipments) > 0) {
                return $equipments[0]->getDepartment()->getAddress();
            }
            return null;
        }
    }

    public function getServiceReportsCount()
    {
        return $this->damageRepo->getServiceReportsCount(Common::getUser());
    }

    public function getDamageReportsCount()
    {
        return $this->damageRepo->getDamageReportsCount(Common::getUser());
    }
}