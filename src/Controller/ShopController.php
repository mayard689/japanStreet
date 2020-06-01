<?php

namespace App\Controller;

use App\Model\MuseumRepository;

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
        $objects=$this->getObjectFromMuseum();

          return $this->render('shop/all.html.twig',['objects'=>$objects]);
    }

    public function getObjectFromMuseum() : array
    {
        $museum=new MuseumRepository();

        return $museum->getObjectsByCulture(3, 'japan');
    }




}