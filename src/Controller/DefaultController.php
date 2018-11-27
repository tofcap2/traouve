<?php
/**
 * Created by PhpStorm.
 * User: CAP2
 * Date: 27/11/2018
 * Time: 10:28
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        return $this->render('default/homepage.html.twig',[
            'controller_name' => 'DefaultController',
        ]);
    }

}