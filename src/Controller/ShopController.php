<?php

namespace App\Controller;

use App\Entity\Shop;
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
        $method=$shop->getTemplate();
        if (! method_exists($this, $method)) {
            $method="all";
        }

        return call_user_func_array([$this, $method], array($shop));
    }

    private function all(Shop $shop)
    {
        $objects=$this->getObjectFromMuseum();
        $picture=$this->getImageFromCamera();
        return $this->render('shop/all.html.twig',['objects'=>$objects, 'picture'=>$picture]);
    }

    private function museum(Shop $shop)
    {
        $objects=$this->getObjectFromMuseum();
        return $this->render(
            'shop/'.$shop->getTemplate().'/place.html.twig',
            [
                'objects'=>$objects,
                'shop' => $shop,
            ]);
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
