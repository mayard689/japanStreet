<?php

namespace App\Controller;

use App\Services\Files\VariousFileTools;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @Route("/shop", name="shop_")
 */
class ShopController extends AbstractController
{

    /**
     * @return string
     *
     * @Route("/visit", name="visit")
     */
    public function visit()
    {
        $objects=getObjectFromMuseum();
        
        $shopList=$this->getAvailableShopPictures();
        return $this->render('shop/all.html.twig',['objects'=>$objects]);
    }

    public function getObjectFromMuseum() : array
    {
        $museum=new MuseumRepository();

        return $museum->getByCulture(3, 'japan');
    }




}