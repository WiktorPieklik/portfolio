<?php


namespace App\Controller;


use App\Entity\Department;
use App\Entity\Equipment;
use App\Entity\OrderT;
use App\Service\EquipmentDataService;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipmentController extends AbstractController
{

    /** @var EquipmentDataService */
    private $service;

    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EquipmentDataService $service, EntityManagerInterface $entityManager)
    {
        $this->service = $service;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/department/{id}/equipments", name="equipment_index")
     * @param Department $department
     * @return Response
     */
    public function index(Department $department)
    {
        $this->service->setUser($this->getUser());
        $equipments = $this->service->getEquipmentsForDepartment($department);

        return $this->render('equipment/index.html.twig', array("equipments" => $equipments));
    }

    /**
     * @Route("/department/{dep_id}/equipment/{e_id}", name="equipment_addToBasket")
     * @param $dep_id
     * @param $e_id
     * @return RedirectResponse
     */
    public function addToBasket($dep_id, $e_id)
    {
        $this->service->setUser($this->getUser());
        /** @var Equipment $equipment */
        $equipment = $this->entityManager->getRepository(Equipment::class)->findOneBy(["id" => $e_id]);

        if($this->service->checkIfPossibleToAddToBasket($equipment))
        {
            $this->service->addEquipmentToBasket($equipment);
            $this->addFlash('success', "Dodano {$equipment->getName()} do koszyka");
            return $this->redirectToRoute("equipment_index", ["id" => $dep_id]);
        }
        $this->addFlash('error', "Możesz wypożyczyć sprzęt tylko z jednej stacji na raz");
        return $this->redirectToRoute("department_index");
    }
}