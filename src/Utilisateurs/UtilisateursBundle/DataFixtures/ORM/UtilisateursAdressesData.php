<?php

namespace Utilisateurs\UtilisateursBundle\DataFixtures\ORM;

use Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UtilisateursAdressesData extends Fixture{
    public function load(ObjectManager $manager){

        $adresse1 = new UtilisateursAdresses();
        $adresse1->setUtilisateur($this->getReference('utilisateur1'));
        $adresse1->setNom('Einstein');
        $adresse1->setPrenom('Albert');
        $adresse1->setTelephone('0101010101');
        $adresse1->setAdresse('1 Rue de la Chimie');
        $adresse1->setCp('75001');
        $adresse1->setPays('France');
        $adresse1->setVille('Paris');
        $adresse1->setComplement('Bâtiment 1');
        $manager->persist($adresse1);

        $adresse2 = new UtilisateursAdresses();
        $adresse2->setUtilisateur($this->getReference('utilisateur2'));
        $adresse2->setNom('Macron');
        $adresse2->setPrenom('Emmanuel');
        $adresse2->setTelephone('0202020202');
        $adresse2->setAdresse('2 Rue de la l\'elisée');
        $adresse2->setCp('75002');
        $adresse2->setPays('France');
        $adresse2->setVille('Paris');
        $adresse2->setComplement('Bâtiment 2');
        $manager->persist($adresse2);

        $adresse3 = new UtilisateursAdresses();
        $adresse3->setUtilisateur($this->getReference('utilisateur3'));
        $adresse3->setNom('Hollande');
        $adresse3->setPrenom('François');
        $adresse3->setTelephone('0303030303');
        $adresse3->setAdresse('3 Rue de la l\'elisée');
        $adresse3->setCp('75003');
        $adresse3->setPays('France');
        $adresse3->setVille('Paris');
        $adresse3->setComplement('Bâtiment 3');
        $manager->persist($adresse3);

        $adresse4 = new UtilisateursAdresses();
        $adresse4->setUtilisateur($this->getReference('utilisateur4'));
        $adresse4->setNom('Poulain');
        $adresse4->setPrenom('Amélie');
        $adresse4->setTelephone('0404040404');
        $adresse4->setAdresse('4 Rue de la Fantaisie');
        $adresse4->setCp('75004');
        $adresse4->setPays('France');
        $adresse4->setVille('Paris');
        $adresse4->setComplement('Bâtiment 4');
        $manager->persist($adresse4);

        $adresse5 = new UtilisateursAdresses();
        $adresse5->setUtilisateur($this->getReference('utilisateur5'));
        $adresse5->setNom('Jolie');
        $adresse5->setPrenom('Emilie');
        $adresse5->setTelephone('0505050505');
        $adresse5->setAdresse('5 Rue du Cinéma');
        $adresse5->setCp('75005');
        $adresse5->setPays('France');
        $adresse5->setVille('Paris');
        $adresse5->setComplement('Bâtiment 5');
        $manager->persist($adresse5);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UtilisateursData::class,
        );
    }
}