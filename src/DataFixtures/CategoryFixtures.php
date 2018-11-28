<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $portefeuille = new Category();
        $portefeuille->setLabel("Portefeuille");
        $portefeuille->setColor("#dc143c");
        $portefeuille->setIcon("fa-money");
        $manager->persist($portefeuille);
        $this->setReference('category-1', $portefeuille);

        $jouet = new Category();
        $jouet->setLabel("Jouet");
        $jouet->setColor("#FFFF00");
        $jouet->setIcon("fa-child");
        $manager->persist($jouet);
        $this->setReference('category-2', $jouet);

        $cle = new Category();
        $cle->setLabel("Cle");
        $cle->setColor("#0000FF");
        $cle->setIcon("fa-key");
        $manager->persist($cle);
        $this->setReference('category-3', $cle);

        $animaux = new Category();
        $animaux->setLabel("Animaux");
        $animaux->setColor("#008000");
        $animaux->setIcon("fa-paw");
        $manager->persist($animaux);
        $this->setReference('category-4', $animaux);



        $manager->flush();
    }
}
