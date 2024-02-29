<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Tresse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class AppFixtures extends Fixture
{
    protected $slugger;
    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create('fr_FR');
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        $faker->addProvider(new \Liior\Faker\Prices($faker));

        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName($faker->productName());
            $product->setSlug(strtolower($this->slugger->slug($product->getName())));
            $product->setPrice($faker->price(2000, 3000));
            $product->setDescription($faker->text(200));
            $manager->persist($product);

            $tresse = new Tresse();
            // $tresse->setIsMove($faker->boolean());
            // $tresse->setMyAddress($faker->address());
            // $tresse->setYourAddress($faker->address());
            // $tresse->setMovePrice($faker->numberBetween(1000, 10000));
            // $tresse->setNumberPerson($faker->numberBetween(1, 5));
            // $tresse->setGenre($faker->randomElement(['Fille', 'Femme', 'Homme', 'Garçon', 'Mixte', 'Unisexe', 'Autre']));
            $tresse->setProduct($product);
            $manager->persist($tresse);
        }

        $manager->flush();
    }
}
