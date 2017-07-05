<?php

namespace SymfonyShop\CatlalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SymfonyShopCatlalogBundle:Default:index.html.twig');
    }
}
