<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Wax;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class WaxFixtures extends Fixture
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

        for($c = 0; $c < 3; $c++) {
            $category = new Category();
            $category->setName($faker->department())
            ->setSlug(strtolower($this->slugger->slug($category->getName())));

            $manager->persist($category);

            for ($i = 0; $i < mt_rand(15, 20); $i++) {
                $product = new Product();
                $product->setName($faker->productName());
                $product->setSlug(strtolower($this->slugger->slug($product->getName())));
                $product->setPrice($faker->price(2000, 3000));
                $product->setDescription($faker->text(200));
                $manager->persist($product);
    
                $wax = new Wax();
                $wax->setProduct($product);
                $wax->setCategory($category);
                $manager->persist($wax);
            }
        }

      

        $manager->flush();
    }
}
