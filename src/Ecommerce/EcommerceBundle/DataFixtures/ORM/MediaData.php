<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Ecommerce\EcommerceBundle\Entity\Media;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MediaData extends Fixture{
    public function load(ObjectManager $manager){

        $media1 = new Media();
        $media1->setFile('Legumes.jpg');
        $media1->setAlt('légumes');
        $manager->persist($media1);

        $media2 = new Media();
        $media2->setFile('Fruits.jpg');
        $media2->setAlt('fruits');
        $manager->persist($media2);

        $media3 = new Media();
        $media3->setFile('Potiron.jpg');
        $media3->setAlt('Potiron');
        $manager->persist($media3);

        $media4 = new Media();
        $media4->setFile('Tomate.jpg');
        $media4->setAlt('Tomate');
        $manager->persist($media4);

        $media5 = new Media();
        $media5->setFile('Aubergine.jpg');
        $media5->setAlt('Aubergine');
        $manager->persist($media5);

        $media6 = new Media();
        $media6->setFile('Citron.jpg');
        $media6->setAlt('Citron');
        $manager->persist($media6);

        $media7 = new Media();
        $media7->setFile('Abricot.jpg');
        $media7->setAlt('Abricot');
        $manager->persist($media7);

        $media8 = new Media();
        $media8->setFile('cassis.jpg');
        $media8->setAlt('Cassis');
        $manager->persist($media8);

        $media9 = new Media();
        $media9->setFile('Chou_Kale.jpg');
        $media9->setAlt('Chou kale');
        $manager->persist($media9);

        $media10 = new Media();
        $media10->setFile('Courgette.jpg');
        $media10->setAlt('Courgette');
        $manager->persist($media10);

        $media11 = new Media();
        $media11->setFile('Fenouil.jpg');
        $media11->setAlt('Fenouil');
        $manager->persist($media11);

        $media12 = new Media();
        $media12->setFile('Noix.jpg');
        $media12->setAlt('Noix');
        $manager->persist($media12);

        $media13 = new Media();
        $media13->setFile('Cerise.jpg');
        $media13->setAlt('Cerise');
        $manager->persist($media13);

        $media14 = new Media();
        $media14->setFile('Mirabelle.jpg');
        $media14->setAlt('Mirabelle');
        $manager->persist($media14);

        $manager->flush();

        $this->addReference('media1', $media1);
        $this->addReference('media2', $media2);
        $this->addReference('media3', $media3);
        $this->addReference('media4', $media4);
        $this->addReference('media5', $media5);
        $this->addReference('media6', $media6);
        $this->addReference('media7', $media7);
        $this->addReference('media8', $media8);
        $this->addReference('media9', $media9);
        $this->addReference('media10', $media10);
        $this->addReference('media11', $media11);
        $this->addReference('media12', $media12);
        $this->addReference('media13', $media13);
        $this->addReference('media14', $media14);
    }
}