<?php


namespace App\Controller;


use App\Entity\Equipment;
use App\Service\BasketDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{
    /** @var BasketDataService */
    private $service;

    public function __construct(BasketDataService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/user/basket", name="basket_index")
     * @return Response
     */
    public function index()
    {
        $this->service->setUser($this->getUser());
        $equipments = $this->service->getBasketEquipments();
        return $this->render("basket/index.html.twig", ["equipments" => $equipments]);
    }

    /**
     * @Route("/user/basket/delete_equipment/{id}", name="basket_delete", methods={"POST"})
     * @param Equipment $equipment
     * @return Response
     */
    public function delete(Equipment $equipment)
    {
        $this->service->removeEquipmentFromBasket($equipment);
        if($this->service->getBasketCount($this->getUser()) == 0)
        {
            return $this->redirectToRoute("department_index");
        }

        $this->addFlash('success', "Usunięto pozycję z koszyka");
        return $this->redirectToRoute("basket_index");
    }

}