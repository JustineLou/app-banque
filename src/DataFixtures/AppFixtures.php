<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\BankAccount;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
     {
         $this->passwordEncoder = $passwordEncoder;
     }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstname('Justine');
        $user->setLastname('Loubry');
        $user->setUsername('admin');
        $user->setBirthday(new \DateTime('1992-09-26'));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'admin'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setFirstname('Jean');
        $user->setLastname('Dupont');
        $user->setUsername('user1');
        $user->setBirthday(new \DateTime('1990-07-12'));
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'user1'
        ));
        $manager->persist($user);

        $user = new User();
        $user->setFirstname('Jeanne');
        $user->setLastname('Durant');
        $user->setUsername('user2');
        $user->setBirthday(new \DateTime('1990-07-12'));
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            'user2'
        ));
        $manager->persist($user);

        $manager->flush();
    }
}
