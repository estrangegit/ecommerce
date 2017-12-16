<?php

namespace Ecommerce\EcommerceBundle\DataFixtures\ORM;

use Ecommerce\EcommerceBundle\Entity\Produits;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ProduitsData extends Fixture{
    public function load(ObjectManager $manager){

        $produit1 = new Produits();
        $produit1->setCategorie($this->getReference('categorie1'));
        $produit1->setDescription('Symbole d’automne, le potiron est originaire d’Amérique du Sud. Très présent dans les jardins d’antan, il redevient populaire depuis plusieurs années. Ses couleurs, sa forme et ses saveurs se marient à merveille avec tous les plats, traditionnels ou audacieux. Les enfants l’adorent.');
        $produit1->setDisponible(true);
        $produit1->setImage($this->getReference('media3'));
        $produit1->setNom('Potiron');
        $produit1->setPrix(3.75);
        $produit1->setTva($this->getReference('tva1'));
        $manager->persist($produit1);

        $produit2 = new Produits();
        $produit2->setCategorie($this->getReference('categorie1'));
        $produit2->setDescription('La tomate colore les étals de nos marchés et nos assiettes tout au long de l’année. Très simple à consommer, elle se prête à une infinité de préparations. Très riche au niveau nutritionnel, elle a de véritables atouts bien-être. Toutes ses qualités en font le légume le plus consommé en France.');
        $produit2->setDisponible(true);
        $produit2->setImage($this->getReference('media4'));
        $produit2->setNom('Tomate');
        $produit2->setPrix(1.50);
        $produit2->setTva($this->getReference('tva2'));
        $manager->persist($produit2);

        $produit3 = new Produits();
        $produit3->setCategorie($this->getReference('categorie1'));
        $produit3->setDescription('Une aubergine pèse 225 g en moyenne. Sa couleur, sa taille et sa forme varient selon les variétés,. La plus fréquente sur les étals est l’aubergine violette, à la chair blanche et moelleuse.');
        $produit3->setDisponible(true);
        $produit3->setImage($this->getReference('media5'));
        $produit3->setNom('Aubergine');
        $produit3->setPrix(1.65);
        $produit3->setTva($this->getReference('tva2'));
        $manager->persist($produit3);

        $produit4 = new Produits();
        $produit4->setCategorie($this->getReference('categorie2'));
        $produit4->setDescription('Le citron occupe une place de choix dans nos cuisines. On l\'aime pour sa chair juteuse, sa saveur qui oscille entre acide et amère, et sa belle couleur jaune doré. Fruit tonique, riche en vitamine C, le citron est aussi source de bienfaits pour votre organisme. Plein de caractère, le citron vert est un fruit tropical. Festif et convivial, il possède un arôme caractéristique qui dynamise vos plats et cocktails. En prime, ce fruit regorge d\'atouts pour votre bien-être.');
        $produit4->setDisponible(true);
        $produit4->setImage($this->getReference('media6'));
        $produit4->setNom('Citron');
        $produit4->setPrix(2.05);
        $produit4->setTva($this->getReference('tva2'));
        $manager->persist($produit4);

        $produit5 = new Produits();
        $produit5->setCategorie($this->getReference('categorie2'));
        $produit5->setDescription('Apparu il y a 5 000 ans, l’abricot est aujourd’hui un fruit apprécié de tous en été. Les variétés se sont développées au fil des années, multipliant les textures et les saveurs. Cultivé dans le sud-est de la France, l’abricot apparaît aux beaux jours et garnit les étals de sa chair gorgée de soleil. Riche en nutriments essentiels, il se décline dans des recettes aussi bien sucrées que salées.');
        $produit5->setDisponible(true);
        $produit5->setImage($this->getReference('media7'));
        $produit5->setNom('Abricot');
        $produit5->setPrix(3.20);
        $produit5->setTva($this->getReference('tva2'));
        $manager->persist($produit5);

        $produit6 = new Produits();
        $produit6->setCategorie($this->getReference('categorie2'));
        $produit6->setDescription('La production du cassis est fortement implantée en France. Deux grandes variétés composent la majorité des cultures, concentrées dans quatre régions françaises. Ses fruits acidulés et juteux se consomment aussi bien nature que préparés en dessert ou sous forme de liqueur (1) et de crème. Riche en nutriments et en vitamines, le cassis participe à votre vitalité au quotidien pendant l’été. ');
        $produit6->setDisponible(true);
        $produit6->setImage($this->getReference('media8'));
        $produit6->setNom('Cassis');
        $produit6->setPrix(5.75);
        $produit6->setTva($this->getReference('tva2'));
        $manager->persist($produit6);

        $produit7 = new Produits();
        $produit7->setCategorie($this->getReference('categorie1'));
        $produit7->setDescription('Encore peu connu en France, le kale possède beaucoup d’autres noms. Parmi lesquels, le « chou frisé » ou le « chard ».');
        $produit7->setDisponible(true);
        $produit7->setImage($this->getReference('media9'));
        $produit7->setNom('Chou kale');
        $produit7->setPrix(2.55);
        $produit7->setTva($this->getReference('tva2'));
        $manager->persist($produit7);

        $produit8 = new Produits();
        $produit8->setCategorie($this->getReference('categorie1'));
        $produit8->setDescription('La courgette est cultivée depuis peu en France, mais elle a su très vite se faire adopter. Ce légume du soleil qui fleure bon la Méditerranée est présent dans les assiettes tout l’été. Facile à préparer, la courgette se consomme sous toutes ses formes. Et sa richesse en vitamines vous donne de l’énergie à la belle saison.');
        $produit8->setDisponible(true);
        $produit8->setImage($this->getReference('media10'));
        $produit8->setNom('Courgette');
        $produit8->setPrix(1.20);
        $produit8->setTva($this->getReference('tva2'));
        $manager->persist($produit8);

        $produit9 = new Produits();
        $produit9->setCategorie($this->getReference('categorie1'));
        $produit9->setDescription('Légume très populaire en Italie, le fenouil se reconnaît à son parfum et à son goût anisé. Référence symbolique et mythologique depuis l’Antiquité, c’est avant tout un aliment particulièrement intéressant sur le plan nutritionnel. On le retrouve avec plaisir dans des plats salés, mais aussi dans les desserts sucrés. ');
        $produit9->setDisponible(true);
        $produit9->setImage($this->getReference('media11'));
        $produit9->setNom('Fenouil');
        $produit9->setPrix(3.30);
        $produit9->setTva($this->getReference('tva2'));
        $manager->persist($produit9);

        $produit10 = new Produits();
        $produit10->setCategorie($this->getReference('categorie2'));
        $produit10->setDescription('L’origine de la noix est très ancienne. La France est aujourd’hui l’un des plus grands producteurs européens et se distingue par ses deux AOC qui récompensent deux régions productrices. Ce fruit est aussi délicieux à croquer qu’intégré à toutes vos recettes, salées et sucrées, auxquelles il apporte une touche goûteuse et croquante. Sa générosité se retrouve également dans sa chair, riche en acides gras, vitamines et minéraux, pour faire le plein d’énergie.');
        $produit10->setDisponible(true);
        $produit10->setImage($this->getReference('media12'));
        $produit10->setNom('Noix');
        $produit10->setPrix(9.90);
        $produit10->setTva($this->getReference('tva2'));
        $manager->persist($produit10);

        $produit11 = new Produits();
        $produit11->setCategorie($this->getReference('categorie2'));
        $produit11->setDescription('La cerise est le premier fruit à noyau de l’année. Dès l’arrivée des beaux jours, elle est récoltée, triée et emballée à la main avant d’atterrir sur les étals. Sucrée ou acidulée, elle peut se consommer au choix crue ou cuite. Certes, elle est un peu plus calorique que les autres fruits. Mais elle possède des qualités nutritionnelles dont il serait dommage de se priver !');
        $produit11->setDisponible(false);
        $produit11->setImage($this->getReference('media13'));
        $produit11->setNom('Cerise');
        $produit11->setPrix(4.90);
        $produit11->setTva($this->getReference('tva2'));
        $manager->persist($produit11);

        $produit12 = new Produits();
        $produit12->setCategorie($this->getReference('categorie2'));
        $produit12->setDescription('Implantée depuis cinq siècles en France, la mirabelle s’est rapidement développée dans l’est du pays. Sa production est labellisée et garantit aujourd’hui la qualité et la saveur du petit fruit doré. Disponible sur les étals dès la mi-août, la mirabelle se prête à toutes sortes de déclinaisons salées et sucrées, toujours gourmandes. Très riche en vitamines, elle se croque à toute heure de la journée en vous prodiguant ses bienfaits.');
        $produit12->setDisponible(true);
        $produit12->setImage($this->getReference('media14'));
        $produit12->setNom('Mirabelle');
        $produit12->setPrix(5.45);
        $produit12->setTva($this->getReference('tva2'));
        $manager->persist($produit12);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TvaData::class,
            CategoriesData::class,
            MediaData::class,
        );
    }
}