<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Product;
use App\Repository\UserRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }

    #[Route('/profil/productUser/{id.user}', name: 'product_user')]
    public function productUser(User $user,ProductRepository $repo)
    {
        $products = $repo->findBy(["user_id"=> $user->getId()]);
        return $this->render('productUser/show.html.twig', [
            'products' => $products
        ]);
    }


}
