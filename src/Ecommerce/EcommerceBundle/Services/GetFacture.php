<?php
namespace Ecommerce\EcommerceBundle\Services;

use Doctrine\ORM\EntityManager;
use Ecommerce\EcommerceBundle\Entity\Commandes;
use Spipu\Html2Pdf\Html2Pdf;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Templating\EngineInterface;

class GetFacture
{
    private $engine;


    public function __construct(EngineInterface $engine)
    {
        $this->engine = $engine;
    }

    public function facture($facture){

        /**
         * @var $facture Commandes
         */

        $html = $this->engine
                    ->render('@Utilisateurs/Default/layout/facturePDF.html.twig', array('facture'=>$facture));

        $html2pdf = new Html2Pdf('P','A4', 'fr');

        $html2pdf->pdf->setAuthor('Vegetable&Fruits');
        $html2pdf->pdf->setTitle('Facture_'.$facture->getReference());
        $html2pdf->pdf->setSubject('Facture Vegetable&Fruits');
        $html2pdf->pdf->setKeywords('Fruits, légumes');

        $html2pdf->pdf->setDisplayMode('real');
        $html2pdf->writeHTML($html);
        $html2pdf->output('Facture.pdf');

        $response = new Response();
        $response->headers->set('Content-Type', 'application/pdf');

        return $response;
    }

}