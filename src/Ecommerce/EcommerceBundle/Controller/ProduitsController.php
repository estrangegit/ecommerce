<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\Entity\Categories;
use Ecommerce\EcommerceBundle\Form\RechercheType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ProduitsController extends Controller
{
    public function produitsAction(SessionInterface $session, Request $request, Categories $categorie=null)
    {
        $em = $this->getDoctrine()->getManager();

        if($categorie != null){
            $findProduits = $em->getRepository('EcommerceBundle:Produits')->byCategorie($categorie);
        }else{
            $findProduits = $em->getRepository('EcommerceBundle:Produits')->findBy(array('disponible'=>true));
        }

        if($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;

        $produits  = $this->get('knp_paginator')
                            ->paginate($findProduits,
                                        $request->query->get('page', 1)/*page number*/,
                                        2/*limit per page*/
                                        );

        return $this->render('@Ecommerce/Default/produits/layout/produits.html.twig', array('produits'=>$produits,
                                                                                        'panier'=>$panier));
    }

    public function presentationAction($id, Request $request)
    {
        $session = $request->getSession();

        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('EcommerceBundle:Produits')->find($id);

        if(!$produit) throw $this->createNotFoundException("Le produit d'id ".$id." n'a pas été trouvé!");

        if($session->has('panier'))
            $panier = $session->get('panier');
        else
            $panier = false;

        return $this->render('@Ecommerce/Default/produits/layout/presentation.html.twig', array('produit' => $produit,
                                                                                            'panier'=>$panier));
    }


    public function rechercheAction(){

        $form = $this->createForm(RechercheType::class);

        return $this->render('@Ecommerce/Default/recherche/modulesUsed/recherche.html.twig',
                                array('form' => $form->createView()));
    }


    public function rechercheTraitementAction(Request $request){

        $form = $this->createForm(RechercheType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->getMethod() == 'POST'){
            $chaine = $form->getData()['recherche'];
        }
        else{
            throw $this->createNotFoundException("La page n'existe pas!");
        }

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->recherche($chaine);

        $produits  = $this->get('knp_paginator')
            ->paginate($produits,
                $request->query->get('page', 1)/*page number*/,
                2/*limit per page*/
            );

        return $this->render('@Ecommerce/Default/produits/layout/produits.html.twig', array('produits' => $produits));

    }
}
