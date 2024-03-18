<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\ProductType;
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
       // $faker->addProvider(new \Liior\Faker\Prices($faker));
        //Tresse
        $productType1 = new ProductType();
        $productType1->setName('Tresses');
        $productType1->setSlug(strtolower($this->slugger->slug($productType1->getName())));
        $manager->persist($productType1);
        //Wax
        $productType2 = new ProductType();
        $productType2->setName('Waxs');
        $productType2->setSlug(strtolower($this->slugger->slug($productType2->getName())));
        $manager->persist($productType2);
        //Savon
        $productType3 = new ProductType();
        $productType3->setName('Savons');
        $productType3->setSlug(strtolower($this->slugger->slug($productType3->getName())));
        $manager->persist($productType3);

        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName($faker->productName());
            $product->setSlug(strtolower($this->slugger->slug($product->getName())));
            $product->setPrice($faker->randomFloat(2, 10, 100));
            $product->setDescription($faker->text(200));
            $product->setGenre($faker->randomElement(['Jeune Fille', 'Fille', 'Dame']));
            $product->setProductType($productType1);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
