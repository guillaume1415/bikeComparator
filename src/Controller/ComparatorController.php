<?php

namespace App\Controller;



use App\Entity\Bike;
use App\Entity\BikeSearch;
use App\Form\BikeSearchType;

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
     * @var BikeRepository
     */
    private $repository;
    /**
     * @var EntityManagerInterface
     */
    private $manager;

    public function __construct(BikeRepository $repository, EntityManagerInterface $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;

    }


    /**
     * @Route("/comparator", name="comparator")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index( PaginatorInterface $paginator,Request $request)
    {
        $search = new BikeSearch();
        $form = $this->createForm(BikeSearchType::class, $search);
        $form->handleRequest($request);
        $property = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            12
        );

        return $this->render('comparator/index.html.twig', [
            'current_menu' => 'properties',
            'properties' => $property,
            'form' => $form->createView()

        ]);
    }

    /**
     * @Route("/comparator/{slug}.{id}", name="bike.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Bike $property
     * @param string $slug
     * @param $id
     * @return Response
     */
    public function show(Bike $property,string $slug, $id):response{
        /* if ($property->getSlug()  !== $slug){
             return  $this->redirectToRoute('property.show',[
                 'id' =>$property->getId(),
                 'slug' =>$property->getSlug(),
             ],301);
         }*/

        return $this->render('comparator/show.html.twig', [
            'property' => $property,
            'current_menu' => 'properties'
        ]);
    }


}





