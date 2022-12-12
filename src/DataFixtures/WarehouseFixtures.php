<?php

namespace App\DataFixtures;
use App\Entity\Warehouse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WarehouseFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $wareHouse = new Warehouse();
        $wareHouse->setWarehouseName('depot sidi bernouci');
        $wareHouse->setLocation('Sidi bernouci, amal 3');
        $wareHouse->setPhoneNumber('0675893451');
        $wareHouse->setMaxCells(2000);
        $wareHouse->setWareHouseImage('https://images.pexels.com/photos/4483610/pexels-photo-4483610.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
        $wareHouse->addProduct($this->getReference('product_1'));
        $wareHouse->addProduct($this->getReference('product_2'));
        $manager->persist(($wareHouse));



        $wareHouse2 = new Warehouse();
        $wareHouse2->setWarehouseName('depot hay mohmadi');
        $wareHouse2->setLocation('Hay Mohamadi, dar aman');
        $wareHouse2->setPhoneNumber('0675908751');
        $wareHouse2->setMaxCells(2500);
        $wareHouse2->setWareHouseImage('https://www.istockphoto.com/photo/3d-warehouse-building-gm1208067405-349050647');
        $wareHouse2->addProduct($this->getReference('product_3'));
        $wareHouse2->addProduct($this->getReference('product_4'));
        $manager->persist(($wareHouse2));

        $manager->flush();

    }
}
