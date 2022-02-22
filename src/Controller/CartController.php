<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart")
     */
    public function index(SessionInterface $session,ProduitRepository $produitRepository): Response
    {
        $panier=$session->get('commande',[]);
        $panierWithData=[];
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



        return $this->render('cart.html.twig', [
            'items'=> $panierWithData,
            'total'=>$total
        ]);
    }

    /**
     * @Route ("commande/add/{id}",name="cart_add")
     */

    public  function add($id,SessionInterface $session)
    {

        $panier=$session->get('commande',[]);

        if(!empty($panier[$id])){
            $panier[$id]++;
        }
        else{$panier[$id]=1;}


        $session->set('commande',$panier);



        return $this->redirectToRoute("affichef");


    }

    /**
     * @Route("commande/remove/{id}" ,name="cart_remove")
     */
    public function remove($id,SessionInterface $session)
    {
         $panier=$session->get('commande',[]);

         if (!empty($panier[$id]))
         {
             unset($panier[$id]);
         }

         $session->set('commande',$panier);



        return $this->redirectToRoute("cart");

    }


    /**
     * @Route("commande/remove2/" ,name="cart_remove2")
     */
    public function remove2(SessionInterface $session)
    {
        $panier=$session->get('commande',[]);

        if (!empty($panier))
        {
          $panier=  array_diff($panier,$panier);
        }

        $session->set('commande',$panier);



        return $this->redirectToRoute("cart");

    }
}
