<?php

namespace App\Controller;

use App\Entity\Marks;
use App\Form\MarksType;
use App\Repository\MarksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/marks")
 */
class MarksController extends AbstractController
{
    /**
     * @Route("/", name="marks_index", methods={"GET"})
     * @param MarksRepository $marksRepository
     * @return Response
     */
    public function index(MarksRepository $marksRepository): Response
    {
        return $this->render('marks/index.html.twig', [
            'marks' => $marksRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="marks_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $mark = new Marks();
        $form = $this->createForm(MarksType::class, $mark);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mark);
            $entityManager->flush();

            return $this->redirectToRoute('marks_index');
        }

        return $this->render('marks/new.html.twig', [
            'mark' => $mark,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="marks_show", methods={"GET"})
     * @param Marks $mark
     * @return Response
     */
    public function show(Marks $mark): Response
    {
        return $this->render('marks/show.html.twig', [
            'mark' => $mark,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="marks_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Marks $mark
     * @return Response
     */
    public function edit(Request $request, Marks $mark): Response
    {
        $form = $this->createForm(MarksType::class, $mark);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('marks_index');
        }

        return $this->render('marks/edit.html.twig', [
            'mark' => $mark,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="marks_delete", methods={"DELETE"})
     * @param Request $request
     * @param Marks $mark
     * @return Response
     */
    public function delete(Request $request, Marks $mark): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mark->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mark);
            $entityManager->flush();
        }

        return $this->redirectToRoute('marks_index');
    }
}
