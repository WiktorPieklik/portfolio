<?php


namespace App\Controller;


use App\Service\DepartmentDataService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DepartmentController extends AbstractController
{
    /** @var DepartmentDataService */
    private $service;

    public function __construct(DepartmentDataService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/departments", name="department_index")
     */
    public function index()
    {
        $this->service->setUser($this->getUser());
        $departments = $this->service->getDepartments();
        return $this->render("department/index.html.twig", array("departments" => $departments));
    }
}