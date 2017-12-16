<?php
namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Ecommerce\EcommerceBundle\Entity\Commandes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Utilisateurs\UtilisateursBundle\DataFixtures\ORM\UtilisateursData;

class CommandesData extends Fixture{
    public function load(ObjectManager $manager){

        $commande1 = new Commandes();
        $commande1->setUtilisateur($this->getReference('utilisateur1'));
        $commande1->setValider(true);
        $commande1->setDate(new \DateTime());
        $commande1->setReference(1);
        $commande1->setProduits(array('0' => array('1' => '2'),
                                      '1' => array('2' => '1'),
                                      '2' => array('4' => '5'),
                                ));
        $manager->persist($commande1);

        $commande2 = new Commandes();
        $commande2->setUtilisateur($this->getReference('utilisateur3'));
        $commande2->setValider(true);
        $commande2->setDate(new \DateTime());
        $commande2->setReference(1);
        $commande2->setProduits(array('0' => array('1' => '2'),
                                      '1' => array('2' => '1'),
                                      '2' => array('4' => '5'),
                                ));
        $manager->persist($commande2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UtilisateursData::class,
        );
    }
}