<?php

namespace Ecommerce\EcommerceBundle\Command;

use Ecommerce\EcommerceBundle\Entity\Commandes;
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
            ->addArgument('date', InputArgument::OPTIONAL, "Date a partir de laquelle vous souhaitez recuperer les factures");
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $date = new \DateTime();
        $em = $this->getContainer()->get('doctrine')->getManager();

        $factures  = $em->getRepository('EcommerceBundle:Commandes')->byDateCommande($input->getArgument('date'));

        $output->writeln(count($factures).' facture(s).');

        if(count($factures)>0){
            $dir = $date->format('d-m-Y-h-i-s');
            mkdir('facturation/'.$dir);

            foreach ($factures as $facture){
                /** @var $facture Commandes */
                $this->getContainer()->get('getFacture')->facture($facture)->output('facturation/'.$dir.'/facture'.$facture->getReference().'.pdf', 'F');
            }
        }




    }

}