<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Ecommerce\EcommerceBundle\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoriesData extends Fixture{
    public function load(ObjectManager $manager){

        $categorie1 = new Categories();
        $categorie1->setNom('Légumes');
        $categorie1->setImage($this->getReference('media1'));
        $manager->persist($categorie1);

        $categorie2 = new Categories();
        $categorie2->setNom('Fruits');
        $categorie2->setImage($this->getReference('media2'));
        $manager->persist($categorie2);

        $manager->flush();

        $this->addReference('categorie1', $categorie1);
        $this->addReference('categorie2', $categorie2);

    }

    public function getDependencies()
    {
        return array(
          MediaData::class,
        );
    }
}