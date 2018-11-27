<?php
namespace App\Controller;

use App\Entity\State;
use App\Entity\Traobject;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
        $stateFound = $this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::FOUND]);
        $traobjectsFound = $this->getDoctrine()->getRepository(Traobject::class)->findLast($stateFound, 2);

        $stateLost = $this->getDoctrine()->getRepository(State::class)->findOneBy(["label" => State::LOST]);
        $traobjectsLost = $this->getDoctrine()->getRepository(Traobject::class)->findLast($stateLost, 2);


        return $this->render('default/homepage.html.twig', [
            'traobjectsFound' => $traobjectsFound,
            'traobjectsLost' => $traobjectsLost
        ]);
    }
}
