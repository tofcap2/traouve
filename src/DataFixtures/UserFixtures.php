<?php
/**
 * Created by PhpStorm.
 * User: CAP2
 * Date: 26/11/2018
 * Time: 13:25
 */

namespace App\DataFixtures;


use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setFirstname("Christophe");
        $admin->setLastname("Capdelacarrere");
        $admin->setEmail("cap2family@hotmail.fr");
        $admin->setPassword($this->passwordEncoder->encodePassword($admin,"1234"));
        $admin->setPhone("0299123456");
        $admin->setRoles(["ROLE_ADMIN"]);
        $admin->setPicture("admin.jpg");
        $manager->persist($admin);
        $this->addReference('user-admin', $admin);

        $jean = new User();
        $jean->setFirstname("Jean");
        $jean->setLastname("Dupont");
        $jean->setEmail("j.dupont@gmail.com");
        $jean->setPassword($this->passwordEncoder->encodePassword($jean, "1234"));
        $jean->setPhone("1234567890");
        $jean->setRoles(["ROLE_USER"]);
        $manager->persist($jean);
        $this->addReference('user-jean', $jean);

        $marie = new User();
        $marie->setFirstname("Marie");
        $marie->setLastname("Martin");
        $marie->setEmail("m.martin@gmail.com");
        $marie->setPassword($this->passwordEncoder->encodePassword($marie, "1234"));
        $marie->setPhone("0987654321");
        $marie->setRoles(["ROLE_USER"]);
        $manager->persist($marie);
        $this->addReference('user-marie', $marie);

        $paul = new User();
        $paul->setFirstname("Paul");
        $paul->setLastname("Durand");
        $paul->setEmail("p.durand@gmail.com");
        $paul->setPassword($this->passwordEncoder->encodePassword($marie, "1234"));
        $paul->setPhone("1209348756");
        $paul->setRoles(["ROLE_USER"]);
        $manager->persist($paul);
        $this->addReference('user-paul', $paul);



        $manager->flush();

    }


}