<?php
/**
 * Created by PhpStorm.
 * User: CAP2
 * Date: 26/11/2018
 * Time: 13:10
 */

namespace App\DataFixtures;


use App\Entity\County;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountyFixtures extends Fixture

{
    public function load(ObjectManager $manager)
    {
        $illeetvilaine = new County();
        $illeetvilaine->setLabel("Ille-et-Vilaine");
        $illeetvilaine->setZipcode("35");
        $manager->persist($illeetvilaine);
        $this->addReference('county-1', $illeetvilaine);

        $morbihan = new County();
        $morbihan->setLabel("Morbihan");
        $morbihan->setZipcode("56");
        $manager->persist($morbihan);
        $this->addReference('county-2', $morbihan);

        $cotedarmor = new County();
        $cotedarmor->setLabel("Cote d'Armor");
        $cotedarmor->setZipcode("22");
        $manager->persist($cotedarmor);
        $this->addReference('county-3', $cotedarmor);

        $finistere = new County();
        $finistere->setLabel("Finistere");
        $finistere->setZipcode("29");
        $manager->persist($finistere);
        $this->addReference('county-4', $finistere);

        $manager->flush();

    }
}