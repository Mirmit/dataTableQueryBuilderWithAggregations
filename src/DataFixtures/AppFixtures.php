<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categoryClothes = new Category();
        $categoryClothes->setName('Clothes');
        $manager->persist($categoryClothes);
        $categoryElectronics = new Category();
        $categoryElectronics->setName('Electronics');
        $manager->persist($categoryElectronics);
        $categoryBooks = new Category();
        $categoryBooks->setName('Books');
        $manager->persist($categoryBooks);
        $categoryFood = new Category();
        $categoryFood->setName('Food');
        $manager->persist($categoryFood);
        for ($i = 0; $i < 500; $i++) {
            $product = new Product();
            $product->setName('product '.$i);
            $product->setSalesAmount(mt_rand(10, 100));
            // Randomly assign a category to the product
            $randomCategory = mt_rand(1, 4);
            if ($randomCategory === 1) {
                $product->setCategory($categoryClothes);
            } elseif ($randomCategory === 2) {
                $product->setCategory($categoryElectronics);
            } elseif ($randomCategory === 3) {
                $product->setCategory($categoryBooks);
            } else {
                $product->setCategory($categoryFood);
            }
            $manager->persist($product);
        }

        $manager->flush();
    }
}
