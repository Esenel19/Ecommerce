<?php

namespace App\Controller;

use App\Service\CartService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{


    /**
     * @Route("/cart", name="app_cart")
     */
    public function index(CartService $cs): Response
    {

        //pour chaque produit dans panier, je recup total par produit puis je add au total final

        return $this->render('cart/index.html.twig', [
            'items' => $cs->getCartWithData(),
            'total' => $cs->getTotal()
        ]);

       
    }
        /**
         * @Route("/cart/add/{id}", name="cart_add")
         */

        public function add($id, CartService $cs)
        {
           $cs->add($id);
            return $this->redirectToRoute('app_cart');
        }

        /**
         * @Route("/cart/remove/{id}", name="cart_remove")
         */
        
         public function remove($id, CartService $cs)
         {
           $cs->remove($id);
           return $this->redirectToRoute('app_cart');
         }

         

        
}
