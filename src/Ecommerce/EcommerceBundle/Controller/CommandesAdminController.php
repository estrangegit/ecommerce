<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\Entity\Commandes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CommandesAdminController extends Controller
{
    public function indexAction(){
        $em = $this->getDoctrine()->getManager();
        $commandes = $em->getRepository('EcommerceBundle:Commandes')->findAll();

        return $this->render('@Ecommerce/administration/commandes/layout/index.html.twig', array('commandes' => $commandes));
    }

    public function showFactureAction($id){
        $em = $this->getDoctrine()->getManager();

        $facture = $em->getRepository(Commandes::class)->find($id);

        if(!$facture){
            $this->get('session')->getFlashBag()->add('error', 'Une erreur est survenue');
            return $this->redirectToRoute('adminCommandes_index');
        }

        return $this->get('getFacture')->facture($facture);
    }
}
