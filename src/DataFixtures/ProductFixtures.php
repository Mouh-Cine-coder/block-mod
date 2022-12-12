<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        
        $product1 = new Product();
        $product1->setProductName('cola 300 ML');
        $product1->setQuantity(398);
        $product1->setPriceUnit('20');
        $product1->setMass(300);
        $product1->setDateCreation(new \DateTime());
        $product1->setCellOccupation(400);
        $manager->persist($product1);


        $product2 = new Product();
        $product2->setProductName('Sprite 300 ML');
        $product2->setQuantity(500);
        $product2->setPriceUnit('16');
        $product2->setMass(400);
        $product2->setDateCreation(new \DateTime());
        $product2->setCellOccupation(700);
        $manager->persist($product2);


        $product3 = new Product();
        $product3->setProductName('fanta 300 ML');
        $product3->setQuantity(38);
        $product3->setPriceUnit('200');
        $product3->setMass(300);
        $product3->setDateCreation(new \DateTime());
        $product3->setCellOccupation(500);
        $manager->persist($product3);


        $product4 = new Product();
        $product4->setProductName('redbull 300 ML');
        $product4->setQuantity(98);
        $product4->setPriceUnit('60');
        $product4->setMass(60);
        $product4->setDateCreation(new \DateTime());
        $product4->setCellOccupation(900);
        $manager->persist($product4);
        $manager->flush();

        $this->addReference('product_1', $product1);
        $this->addReference('product_2', $product2);
        $this->addReference('product_3', $product3);
        $this->addReference('product_4', $product4);

        $manager->flush();
    }
}
