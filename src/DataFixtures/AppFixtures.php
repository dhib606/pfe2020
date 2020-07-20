<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture {

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder) {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager) {
        $faker = Factory::create('fr_FR');
        // Ajouter utilisateur
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, 'password'));
        $admin->setRoles(array('ROLE_ADMIN'));
        $manager->persist($admin);
        $user = new User();
        $user->setUsername('user');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'password'));
        $user->setRoles(array('ROLE_USER'));
        $manager->persist($user);
        // Ajouter message
        for ($j = 0; $j < 20; $j++) {
            $contact = new Contact();
            $contact->setName($faker->name);
            $contact->setEmail($faker->email);
            $contact->setSubject($faker->text($maxNbChars = 100));
            $contact->setContent($faker->text($maxNbChars = 500));
            $manager->persist($contact);
        }

        $manager->flush();
    }

}
