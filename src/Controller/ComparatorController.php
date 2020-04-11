<?php

namespace App\Controller;



use App\Data\SearchData;
use App\Entity\BikeSearch;
use App\Form\BikeSearchType;


use App\Form\SearchForm;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\BikeRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComparatorController extends AbstractController
{




    /**
     * @Route("/comparator", name="comparator")
     * @param BikeRepository $repository
     * @param Request $request
     * @return Response
     */
    public function index( BikeRepository $repository,Request $request)
    {
        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        $property = $repository->findAllVisibleQuery($data);
        return $this->render('comparator/index.html.twig', [
            'properties' => $property,
            'form' => $form->createView()

        ]);
    }
}





