<?php

namespace App\Controller\Admin;

use App\Entity\Bike;
use App\Entity\BikeSearch;
use App\Form\BikeType;

use App\Repository\BikeRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPropertyController extends AbstractController{

    /**
     * @var BikeRepository
     */
    private $repository;

    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(BikeRepository $repository,EntityManagerInterface $em)
    {
        $this->repository = $repository;

        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.property.index")
     * @return Response
     */
    public function index(){
        $properties = $this->repository->findAll();
        return $this->render('admin/Property/index.html.twig',compact('properties'));
    }


    /**
     * @Route("/admin/property/creat ", name="admin.property.new")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function new(Request $request){
        $property = new Bike();
        $form = $this->createForm(BikeType::class, $property);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->em->persist($property);
            $this->em->flush();
            $this->addFlash('success','Votre bien à bien était enregistrée');
            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('admin/Property/new.html.twig',[
            'property' => $property,
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/admin/property/{id}", name="admin.property.edit",methods="GET|POST")
     * @param Bike $property
     * @param Request $request
     * @return Response
     */
    public function edit(Bike $property,Request $request){

        $form = $this->createForm(BikeType::class, $property);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $this->em->flush();
            $this->addFlash('success','Votre modification à bien était enregistrée');
            return $this->redirectToRoute('admin.property.index');
        }
        return $this->render('admin/Property/edit.html.twig',[
            'property' => $property,
            'form' => $form->createView()
        ]);

    }

    /**
     * @Route("/admin/property/{id}", name="admin.property.delete",methods="DELETE")
     * @param Bike $property
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Bike $property,Request $request ){
        dump('suppression');
        if($this->isCsrfTokenValid('delete' . $property->getId(), $request->get('_token') )){
            $this->em->remove($property);
            $this->em->flush();
            $this->addFlash('success','supprimé avec succès');
        }
        //$this->em->remove($property);
        //$this->em->flush();

        return $this->redirectToRoute('admin.property.index');
    }


}