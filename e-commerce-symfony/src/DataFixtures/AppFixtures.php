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
        // Create categories
        $electronics = new Category();
        $electronics->setName('Electronics');
        $manager->persist($electronics);

        $accessories = new Category();
        $accessories->setName('Accessories');
        $manager->persist($accessories);

        $computers = new Category();
        $computers->setName('Computers');
        $manager->persist($computers);

        // Create products
        $p1 = new Product();
        $p1->setName('Wireless Mouse');
        $p1->setDescription('A smooth and precise wireless mouse.');
        $p1->setPrice(29.99);
        $p1->setImage('mouse.png');
        $p1->setCategory($electronics);
        $manager->persist($p1);

        $p2 = new Product();
        $p2->setName('Air Buds Pro');
        $p2->setDescription('Premium sound quality wireless earbuds.');
        $p2->setPrice(59.99);
        $p2->setImage('airbod.png');
        $p2->setCategory($electronics);
        $manager->persist($p2);

        $p3 = new Product();
        $p3->setName('Laptop Bag');
        $p3->setDescription('Stylish and durable laptop bag.');
        $p3->setPrice(39.99);
        $p3->setImage('item.png');
        $p3->setCategory($accessories);
        $manager->persist($p3);

        $p4 = new Product();
        $p4->setName('Gaming Keyboard');
        $p4->setDescription('Mechanical keyboard with RGB lighting.');
        $p4->setPrice(89.99);
        $p4->setImage('thumbnail.png');
        $p4->setCategory($computers);
        $manager->persist($p4);

        $manager->flush();
    }
}