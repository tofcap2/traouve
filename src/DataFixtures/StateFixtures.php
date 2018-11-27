<?php
/**
 * Created by PhpStorm.
 * User: CAP2
 * Date: 26/11/2018
 * Time: 14:36
 */

namespace App\DataFixtures;


use App\Entity\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StateFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $trouve = new State();
        $trouve->setLabel("Trouve");
        $trouve->setColor("#0000FF");
        $manager->persist($trouve);
        $this->addReference('state-trouve', $trouve);

        $perdu = new State();
        $perdu->setLabel("Perdu");
        $perdu->setColor("#FF0000");
        $manager->persist($perdu);
        $this->addReference('state-perdu', $perdu);

        $manager->flush();

    }
}