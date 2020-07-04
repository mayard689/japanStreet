<?php

namespace App\Controller;

use App\Repository\MuseumRepository;
use App\Repository\WindyRepository;

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
     * @Route("/visit/{id}", name="visit")
     */
    public function visit(?Shop $shop)
    {
        $objects=$this->getObjectFromMuseum();
        $picture=$this->getImageFromCamera();

          return $this->render('shop/all.html.twig',['objects'=>$objects, 'picture'=>$picture]);
    }

    public function getObjectFromMuseum() : array
    {
        $museum=new MuseumRepository();

        return $museum->getObjectsByCulture(3, 'japan');
    }

    public function getImageFromCamera() : string
    {
        $camera=new WindyRepository();

        return $camera->getPicture();
    }


}
