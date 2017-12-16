<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Ecommerce\EcommerceBundle\Entity\Commandes;
use Spipu\Html2Pdf\Html2Pdf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class UtilisateursController extends Controller
{
    public function facturesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $factures = $em->getRepository(Commandes::class)->byFacture($this->getUser());

        return $this->render('@Utilisateurs/Default/layout/facture.html.twig', array('factures'=>$factures));
    }

    public function facturesPDFAction($id){
        $em = $this->getDoctrine()->getManager();

        $facture = $em->getRepository(Commandes::class)->findOneBy(array('utilisateur'=>$this->getUser(),
                                                                                    'valider'=>1,
                                                                                    'id'=>$id));

        if(!$facture){
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirectToRoute('factures');
        }

        $html = $this->render('@Utilisateurs/Default/layout/facturePDF.html.twig', array('facture'=>$facture));

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
