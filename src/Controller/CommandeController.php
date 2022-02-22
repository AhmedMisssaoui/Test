<?php

namespace App\Controller;
use App\Entity\Produit;
use App\Entity\Commande;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class CommandeController extends AbstractController
{
    /**
     * @Route("/commande", name="commande")
     */
    public function index(): Response
    {
        return $this->render('commande/index.html.twig', [
            'controller_name' => 'CommandeController',
        ]);
    }

    /**
     * @Route("/commande/add_commande", name="add_commande")
     */
    public function add_commande(SessionInterface $session, ProduitRepository $produitRepository): Response
    {
        $panier = $session->get('commande', []);
        $panierWithData = [];


        $em=$this->getDoctrine()->getManager();

        foreach ($panier as $id => $quantity){

            $panierWithData[]=[
                'product'=>$produitRepository->find($id),
                'quantity'=>$quantity
            ];
        }
        $total =0;
        foreach ($panierWithData as $item) {
            $totaItem=$item['product']->getprix() * $item['quantity'];
            $total+=$totaItem;
        }

        foreach($panierWithData as $item) {

            $commande =new  Commande();

            $commande->setIdP($item['product']->getid());
            $commande->setPrixU($item['product']->getprix());
            $commande->setQte($item['quantity']);
            $commande->setDate(new \DateTime('@'.strtotime('now')));
            $commande->setIdU(1);

            $em->persist($commande);
            $em->flush();

        }



        return $this->redirectToRoute("cart_remove2");


    }

}
