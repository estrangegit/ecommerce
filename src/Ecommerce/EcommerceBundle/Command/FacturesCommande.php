<?php

namespace Ecommerce\EcommerceBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class FacturesCommande extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('ecommerce:facture')
            ->setDescription("Cette commande permet d'exporter les factures editee a partir d'une date choisie")
            ->addArgument('date', InputArgument::OPTIONAL, "Date a partir de laquelle vous souhaitez récupérer les factures");
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //$date = new \DateTime();
        $em = $this->getContainer()->get('doctrine')->getManager();

        $facture  = $em->getRepository('EcommerceBundle:Commandes')->find(23);

        $this->getContainer()->get('getFacture')->facture($facture)->output('/facturation/facture.pdf', 'F');

    }

}