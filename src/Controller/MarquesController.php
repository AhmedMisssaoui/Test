<?php

namespace App\Controller;


use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Marques;
use App\Form\MarquesType;


class MarquesController extends AbstractController
{
    /**
     * @Route("/marques", name="marques")
     */
    public function index(): Response
    {
        return $this->render('marques/index.html.twig', [
            'controller_name' => 'MarquesController',
        ]);
    }

    /**
     * @Route("/ajoutm", name="ajoutm")
     */
    public function ajoutm(Request $request): Response
    {
        $c=new Marques();
        $form=$this->createForm(MarquesType::class,$c);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($c);
            $em->flush();
            // return $this->redirectToRoute("affichec");

        }

        return $this->render('Marques/ajout_marque.html.twig', [ 'f'=>$form->createView()]);

    }

    /**
     * @Route("/affichem", name="affichem")
     */
    public function affichem(): Response
    {
        $r=$this->getDoctrine()->getRepository(Marques::class);
        $p=$r->findAll();
        return $this->render('Marques/index.html.twig', ['k'=>$p,
        ]);
    }

    /**
     * @Route("/modifm/{id}", name="modifm")
     */
    public function modifm(Request $request,$id): Response
    {

        $class=$this->getDoctrine()->getRepository(Marques::class)->find($id);


        $form=$this->createForm(MarquesType::class,$class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();

            $em->flush();
            return $this->redirectToRoute("affichec");
        }

        return $this->render('Marques/modif_marque.html.twig', [ 'f'=>$form->createView()]);



    }

    /**
     *
     * @Route("/suppm/{id}", name="suppm")
     */
    public function suppm($id): Response
    {
        $class=$this->getDoctrine()->getRepository(Marque::class)->find($id);
        $d=$this->getDoctrine()->getManager();
        $d->remove($class);
        $d->flush();
        return $this->redirectToRoute("affichec");

    }

}
