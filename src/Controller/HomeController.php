<?php

namespace App\Controller;

use App\Services\Files\VariousFileTools;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @Route("/", name="home_")
 */
class HomeController extends AbstractController
{

    /**
     * @return string
     *
     * @Route("", name="index")
     */
    public function index()
    {
        $shopList=$this->getAvailableShopPictures();
        return $this->render('home/index.html.twig',['shopList'=>$shopList]);
    }

    public static function getAvailableShopPictures() : array
    {
        $path=$_SERVER['DOCUMENT_ROOT'].'../assets/images/spots/';
        $files=VariousFileTools::getAvailableFiles($path);
        return array_map(function($x){return substr($x,0,-4);}, $files);
    }


}
