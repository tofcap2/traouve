<?php
namespace App\Controller;

use App\Entity\State;
use App\Entity\Traobject;
use Symfony\Component\Routing\Annotation\Route;


class LostTraobjectController extends BaseController
{
    /**
     * @Route("/", name="lost_traobject")
     */
    public function index()
    {
        $lostState = $this->getDoctrine()->getRepository(State::class)->findByState(["label" => State::LOST]);
        $lostTraobject = $this->getDoctrine()->getRepository(Traobject::class)->findLast($lostState);
    }
}
