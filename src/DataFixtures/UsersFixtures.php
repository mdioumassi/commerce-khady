<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\ProductType;
use App\Entity\Tresse;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\String\Slugger\SluggerInterface;

class UsersFixtures extends Fixture
{

    public function __construct(
       protected UserPasswordHasherInterface $passwordHasher
    )
    {
    }
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');
       
        $admin = new User();    
        $hash = $this->passwordHasher->hashPassword($admin, 'admin');
        $admin->setEmail('admin@gmail.com')
              ->setFullname('admin')
              ->setNickname($faker->userName())
              ->setPassword($hash)
              ->setIsVerified(true)
              ->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        for($i = 0; $i < 10; $i++){
            $user = new User();
            $hash = $this->passwordHasher->hashPassword($user, $faker->password());
            $user->setEmail($faker->email());
            $user->setNickname($faker->userName());
            $user->setFullname($faker->name());
            $user->setPassword($hash);
            $user->setIsVerified($faker->boolean());
            $manager->persist($user);
        }
        $manager->flush();
    }
}
