<?php

namespace Utilisateurs\UtilisateursBundle\DataFixtures\ORM;

use Utilisateurs\UtilisateursBundle\Entity\Utilisateurs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UtilisateursData extends Fixture{
    public function load(ObjectManager $manager){

        $encoder = $this->container->get('security.password_encoder');

        $utilisateur1 = new Utilisateurs();
        $utilisateur1->setUsername('albert');
        $utilisateur1->setEmail('albert@gmail.com');
        $utilisateur1->setEnabled(true);
        $utilisateur1->setPassword($encoder->encodePassword($utilisateur1,'pass'));
        $manager->persist($utilisateur1);

        $utilisateur2 = new Utilisateurs();
        $utilisateur2->setUsername('emmanuel');
        $utilisateur2->setEmail('emmanuel@gmail.com');
        $utilisateur2->setEnabled(true);
        $utilisateur2->setPassword($encoder->encodePassword($utilisateur2,'pass'));
        $manager->persist($utilisateur2);

        $utilisateur3 = new Utilisateurs();
        $utilisateur3->setUsername('françois');
        $utilisateur3->setEmail('françois@gmail.com');
        $utilisateur3->setEnabled(true);
        $utilisateur3->setPassword($encoder->encodePassword($utilisateur3,'pass'));
        $manager->persist($utilisateur3);

        $utilisateur4 = new Utilisateurs();
        $utilisateur4->setUsername('amelie');
        $utilisateur4->setEmail('amelie@gmail.com');
        $utilisateur4->setEnabled(true);
        $utilisateur4->setPassword($encoder->encodePassword($utilisateur4,'pass'));
        $manager->persist($utilisateur4);

        $utilisateur5 = new Utilisateurs();
        $utilisateur5->setUsername('emilie');
        $utilisateur5->setEmail('emilie@gmail.com');
        $utilisateur5->setEnabled(true);
        $utilisateur5->setPassword($encoder->encodePassword($utilisateur5,'pass'));
        $manager->persist($utilisateur5);

        $manager->flush();

        $this->addReference('utilisateur1', $utilisateur1);
        $this->addReference('utilisateur2', $utilisateur2);
        $this->addReference('utilisateur3', $utilisateur3);
        $this->addReference('utilisateur4', $utilisateur4);
        $this->addReference('utilisateur5', $utilisateur5);
    }

}