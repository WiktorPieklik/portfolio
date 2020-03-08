<?php

namespace App\Controller;

use App\Common\Common;
use App\Entity\DamageReport;
use App\Entity\OrderT;
use App\Entity\User;
use App\Form\UserRegisterType;
use App\Service\DamageReportDataService;
use App\Service\EquipmentDataService;
use App\Service\OrderDataService;
use App\Service\SystemService;
use App\Service\UserService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /** @var OrderDataService */
    private $orderService;

    /** @var UserService */
    private $userService;

    /** @var DamageReportDataService */
    private $damageService;

    /** @var EquipmentDataService */
    private $equipmentService;

    /** @var SystemService */
    private $systemService;

    public function __construct(OrderDataService $orderService, UserService $userService,
                                DamageReportDataService $damageService, EquipmentDataService $equipmentService,
                                SystemService $systemService)
    {
        $this->orderService = $orderService;
        $this->userService = $userService;
        $this->damageService = $damageService;
        $this->equipmentService = $equipmentService;
        $this->systemService = $systemService;
    }

    /**
     * @Route("/", name="user_index")
     */
    public function index()
    {
        $this->userService->setUser($this->getUser());
        $currentUserRole = Common::getUser()? Common::getUser()->getRoles()[0] : User::ROLE_VISITOR;
        switch($currentUserRole)
        {
            case User::ROLE_USER:
            case User::ROLE_VISITOR:
            default: //temporarily default is used because I don't have views for other roles
                return $this->redirectToRoute('department_index');
            case User::ROLE_SERVICEMAN:
                return $this->redirectToRoute('serviceman_index');
        }
    }

    /**
     * @Route("/user/{id}/activeorders", name="user_myorders")
     * @param User $user
     * @return Response
     */
    public function myActiveOrders(User $user)
    {
        $this->orderService->setUser($user);
        $orders = $this->orderService->getUserActiveOrders($user);
        return $this->render("user/myorders.html.twig", array("myOrders" => $orders,
            "title" => "Aktywne wypożyczenia",
            "description" => "Wygląda na to, że masz żadnych aktywnych wypożyczeń.",
            "isReturn" => true));
    }

    /**
     * @Route("/order/{id}/", name="user_finishorder", methods={"POST"})
     * @param OrderT $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function finishOrder(OrderT $order, Request $request)
    {
        Common::setUser($this->getUser());

        $departmentId = $request->request->get("returnOrder");
        $this->orderService->finishOrder($order, $departmentId);

        return $this->redirectToRoute("user_myfinishedorders", ["id" => Common::getUser()->getId()]);
    }

    /**
     * @Route("/order/{id}/damagereport", name="user_damagereport", methods={"POST"})
     * @param OrderT $order
     * @param Request $request
     * @return RedirectResponse
     */
    public function reportDamage(OrderT $order, Request $request)
    {
        $message = $request->request->get('message');
        $damagedEquipments = $request->request->get('order_equipments');
        $departmentID = $request->request->get('returnOrderDamageDepartmentId');
        $this->damageService->reportDamage($order, $damagedEquipments, $message, $departmentID);

        return $this->redirectToRoute("user_myfinishedorders", ["id" => $this->getUser()->getId()]);
    }

    /**
     * @Route("/user/{id}/myreservations", name="user_myreservations")
     * @param User $user
     * @return Response
     */
    public function myReservations(User $user)
    {
       $this->orderService->setUser($user);
       $reservations = $this->orderService->getUserReservations($user);
       return $this->render("user/myreservations.html.twig", array("myReservations" => $reservations,
       "description" => "Wygląda na to, że jeszcze niczego nie zarezerwowałeś/aś.", "isReturn" => false));
    }

    /**
     * @Route("/user{id}/finishedorders", name="user_myfinishedorders")
     * @param User $user
     * @return Response
     */
    public function myFinishedOrders(User $user)
    {
        $this->orderService->setUser($user);
        $orders = $this->orderService->getUserFinishedOrders($user);
        return $this->render("user/myorders.html.twig", array("myOrders" => $orders,
            "title" => "Historia wypożyczeń",
            "description" => "Wygląda na to, że jeszcze niczego nie wypożyczyłeś/aś.",
            "departments" => null, "isReturn" => false));
    }

    /**
     * @Route("/user/{id}/makeorder", name="user_makeorder", methods={"POST"})
     * @param User $user
     * @return RedirectResponse
     * @throws Exception
     */
    public function makeOrder(User $user, Request $request)
    {
        $this->orderService->setUser($user);

        $isReservation = $request->request->get("isReservation");
        $reservationId = $request->request->get("reservationId");
        $this->orderService->processOrder($user, $isReservation, $reservationId);

        return $this->redirectToRoute("user_myorders", ["id" => $this->getUser()->getId()]);
    }

    /**
     * @Route("/user/{id}/emptybasket", name="user_emptybasket", methods={"POST"})
     * @param User $user
     * @return RedirectResponse
     */
    public function emptyBasket(User $user)
    {
        $this->userService->setUser($user);
        $this->orderService->emptyBasket(true);

        return $this->redirectToRoute("department_index");
    }

    /**
     * @Route("/user{id}/makereservation", name="user_makereservation", methods={"POST"})
     * @param User $user
     * @return RedirectResponse
     */
    public function makeReservation(User $user)
    {
        $this->orderService->setUser($user);
        $this->orderService->processReservation($user);

        return $this->redirectToRoute("user_myreservations", ["id" => $user->getId()]);
    }

    /**
     * @Route("/logout", name="user_logout")
     */
    public function logOut()
    {
        $this->orderService->setUser($this->getUser());
        $this->orderService->emptyBasket();

        return $this->redirectToRoute("app_logout");
    }

    /**
     * @Route("/register", name="user_register")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function register(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserRegisterType::class, $user);

        if($request->isMethod(Request::METHOD_POST))
        {
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid())
            {
                if($this->userService->isUserExisting($form->getData()->getUsername()))
                {
                    $this->addFlash('error', "Nazwa użytkownika jest już zajęta!");
                    return $this->redirectToRoute("user_register");
                }
                $this->userService->encodePassword($form->getData()->getPassword(), $user);

                $this->addFlash('success', "Pomyślnie zarejestrowano");
                return $this->redirectToRoute("app_login");
            }
            $this->addFlash('error', "Nie udało się zarejestrować");
        }

        return $this->render("user/register.html.twig", ["form" => $form->createView()]);
    }

    /**
     * @Route("/serviceman", name="serviceman_index")
     */
    public function servicemanIndex()
    {
        $this->damageService->setUser($this->getUser());
        $damageReports = $this->damageService->getDamageReports();
        $serviceReports = $this->systemService->getServiceReports(Common::getUser());

        return $this->render('serviceman/index.html.twig', [
            "damageReports" => $damageReports,
            "serviceReports" => $serviceReports]);
    }

    /**
     * @Route("/serviceman/assigndamagereport/{id}", name="serviceman_assigndamage", methods={"POST"})
     * @param DamageReport $damageReport
     * @return RedirectResponse
     */
    public function assignDamageReport(DamageReport $damageReport)
    {
        $this->userService->setUser($this->getUser());
        $this->userService->assignDamageReport($damageReport);

        return $this->redirectToRoute("serviceman_damagereports");
    }

    /**
     * @Route("/serviceman/assignservice/{id}", name="serviceman_assignservice", methods={"POST"})
     * @param DamageReport $serviceReport
     * @return RedirectResponse
     */
    public function assignEquipmentService(DamageReport $serviceReport)
    {
        $this->userService->setUser($this->getUser());
        $this->systemService->assignServiceReport($serviceReport);

        return $this->redirectToRoute("serviceman_servicereports");
    }

    /**
     * @Route("/serviceman/myservicereports", name="serviceman_servicereports")
     */
    public function myServiceReports()
    {
        $this->userService->setUser($this->getUser());
        $serviceReports = $this->userService->getAssignedServiceReports();

        return $this->render("serviceman/myservicereports.html.twig", ["serviceReports" => $serviceReports]);
    }

    /**
     * @Route("/serviceman/mydamagereports", name="serviceman_damagereports")
     */
    public function myDamageReports()
    {
        $this->userService->setUser($this->getUser());
        $damageReports = $this->userService->getAssignedDamageReports();

        return $this->render("serviceman/mydamagereports.html.twig", ["damageReports" => $damageReports]);
    }

    /**
     * @Route("/serviceman/handleequipments", name="serviceman_handleequipments")
     * @param Request $request
     * @return RedirectResponse
     */
    public function handleEquipmentAction(Request $request)
    {
        if($request->isMethod(Request::METHOD_POST))
        {
            $equipments = $request->request->get("damage_equipments");
            $isUtilized = $request->request->get('utilizeButton');
            $isRepair = $request->request->get('repairButton');
            $this->equipmentService->handleAction($isRepair, $isUtilized, $equipments);
        }

        return $this->redirectToRoute("serviceman_damagereports");
    }

    /**
     * @Route("/serviceman/finishdamagereport/{id}", name="serviceman_finishdamagereport")
     * @param DamageReport $damageReport
     * @return RedirectResponse
     */
    public function finishDamageReport(DamageReport $damageReport)
    {
        $this->damageService->finishDamageReport($damageReport);
        $this->addFlash("success", "Pomyślnie zakończono naprawę");

        return $this->redirectToRoute("serviceman_damagereports");
    }

    /**
     * @Route("/serviceman/finishservicereport/{id}", name="serviceman_finishservicereport", methods={"POST"})
     * @param DamageReport $serviceReport
     * @return RedirectResponse
     */
    public function finishServiceReport(DamageReport $serviceReport)
    {
        $this->systemService->finishServiceReport($serviceReport);

        return $this->redirectToRoute("serviceman_index");
    }
}