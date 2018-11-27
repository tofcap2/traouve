<?php
/**
 * Created by PhpStorm.
 * User: CAP2
 * Date: 26/11/2018
 * Time: 14:49
 */

namespace App\DataFixtures;


use App\Entity\Traobject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TraobjectFixtures extends Fixture implements DependentFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $wallet = new Traobject();
        $wallet->setTitle("Porte monnaie perdu");
        $wallet->setPicture("wallet.jpg");
        $wallet->setDescription("Hierosolymis visitur visitur provinciae pari usus pari sed speciem plurimis pari Hierosolymis medelarum Pompeius speciem.");
        $wallet->setEventAt(new \DateTime("2018-11-23"));
        $wallet->setCity("Rennes");
        $wallet->setAddress("Rue Gambetta");
        $wallet->setCreatedAt(new \DateTime("2018-11-25"));
        $wallet->setCategory($this->getReference("category-1"));
        $wallet->setState($this->getReference("state-trouve"));
        $wallet->setUser($this->getReference("user-jean"));
        $wallet->setCounty($this->getReference("county-1"));
        $manager->persist($wallet);

        $ballon= new Traobject();
        $ballon->setTitle("Ballon perdu");
        $ballon->setPicture("ballon.jpg");
        $ballon->setDescription("Mon fils a perdu son ballon");
        $ballon->setEventAt(new \DateTime("2018-11-12"));
        $ballon->setCity("Brest");
        $ballon->setAddress("Rue Mermoz");
        $ballon->setCreatedAt(new \DateTime("2018-11-12"));
        $ballon->setCategory($this->getReference("category-2"));
        $ballon->setState($this->getReference("state-perdu"));
        $ballon->setUser($this->getReference("user-marie"));
        $ballon->setCounty($this->getReference("county-4"));
        $manager->persist($ballon);

        $cles= new Traobject();
        $cles->setTitle("Cles voitures");
        $cles->setPicture("keys.jpg");
        $cles->setDescription("J'ai perdu les cles de ma Ferrari");
        $cles->setEventAt(new \DateTime("2018-10-12"));
        $cles->setCity("Vannes");
        $cles->setAddress("Rue Clemenceau");
        $cles->setCreatedAt(new \DateTime("2018-10-12"));
        $cles->setCategory($this->getReference("category-3"));
        $cles->setState($this->getReference("state-perdu"));
        $cles->setUser($this->getReference("user-admin"));
        $cles->setCounty($this->getReference("county-2"));
        $manager->persist($cles);

        $manager->flush();

    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [CategoryFixtures::class, UserFixtures::class, CountyFixtures::class, StateFixtures::class];
    }
}