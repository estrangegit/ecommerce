<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\EcommerceBundle;
use Ecommerce\EcommerceBundle\Entity\Commandes;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses;
use Ecommerce\EcommerceBundle\Form\UtilisateursAdressesType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierController extends Controller
{
    public function menuAction(SessionInterface $session){
        if(!$session->has('panier'))
            $nbArticles = 0;
        else
            $nbArticles = count($session->get('panier'));

        return $this->render('@Ecommerce/Default/panier/modulesUsed/menuPanier.html.twig', array('nbArticles'=>$nbArticles));
    }

    public function panierAction(SessionInterface $session)
    {
        if(!$session->has('panier'))
            $session->set('panier', array());

        $panier = $session->get('panier');

        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('EcommerceBundle:Produits')->findArray(array_keys($session->get('panier')));

        return $this->render('@Ecommerce/Default/panier/layout/panier.html.twig', array('produits' => $produits,
                                                                                            'panier' => $panier));
    }


    public function adresseSuppressionAction($id){
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('EcommerceBundle:UtilisateursAdresses')->find($id);

        if($this->container->get('security.token_storage')->getToken()->getUser() != $entity->getUtilisateur() || !$entity)
            return $this->redirectToRoute('livraison');

        $em->remove($entity);
        $em->flush();

        return $this->redirectToRoute('livraison');
    }

    public function livraisonAction(Request $request)
    {
        $titre = $this->get('translator')->trans('text.titre');

        $utilisateur = $this->container->get('security.token_storage')->getToken()->getUser();

        $entity = new UtilisateursAdresses();
        $form = $this->createForm(UtilisateursAdressesType::class,
                                    $entity,
                                    array('em' => $this->getDoctrine()->getManager()));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->getMethod() == 'POST'){
            $em = $this->getDoctrine()->getManager();
            $entity->setUtilisateur($utilisateur);
            $em->persist($entity);
            $em->flush();

            unset($entity);
            unset($form);

            $entity = new UtilisateursAdresses();
            $form = $this->createForm(UtilisateursAdressesType::class,
                                            $entity,
                                            array('em' => $this->getDoctrine()->getManager()));

            $this->redirectToRoute('livraison');
        }

        return $this->render('@Ecommerce/Default/panier/layout/livraison.html.twig', array('form'=>$form->createView(),
                                                                                                'utilisateur'=>$utilisateur,
                                                                                                'titre' => $titre));
    }

    public function setLivraisonOnSession(SessionInterface $session, Request $request){

        if(!$session->has('adresse'))
            $session->set('adresse', array());

        $adresse = $session->get('adresse');

        if($request->request->get('livraison') != null && $request->request->get('facturation') != null){
            $adresse['livraison'] = $request->request->get('livraison');
            $adresse['facturation'] = $request->request->get('facturation');
        }else{
            return $this->redirectToRoute('validation');
        }

        $session->set('adresse', $adresse);
        return $this->redirectToRoute('validation');
    }


    public function validationAction(SessionInterface $session, Request $request)
    {
        if($request->getMethod() == 'POST')
            $this->setLivraisonOnSession($session, $request);

        $em = $this->getDoctrine()->getManager();

        $prepareCommande = $this->forward('EcommerceBundle:Commandes:prepareCommande');

        $commandes = $em->getRepository(Commandes::class)->find($prepareCommande->getContent());

        return $this->render('@Ecommerce/Default/panier/layout/validation.html.twig', array('commandes' => $commandes));
    }

    public function ajouterAction($id, SessionInterface $session, Request $request){

        if(!$session->has('panier'))
            $session->set('panier', array());

        $panier = $session->get('panier');

        if(array_key_exists($id, $panier)) {
            if ($request->query->get('qte') != null){
                $this->addFlash('success','Quantité modifiée avec succès');
                $panier[$id] = $request->query->get('qte');
            }
        }else{
            if($request->query->get('qte') != null)
                $panier[$id]=$request->query->get('qte');
            else
                $panier[$id]="1";
            $this->addFlash('success','Article ajouté avec succès');
        }

        $session->set('panier', $panier);

        return $this->redirect($this->generateUrl('panier'));
    }

    public function supprimerAction($id, SessionInterface $session){

        if(!$session->has('panier'))
            $session->set('panier', array());

        $panier = $session->get('panier');

        if(array_key_exists($id, $panier)){
            unset($panier[$id]);
            $session->set('panier', $panier);
            $this->addFlash('success','Article supprimé avec succès');
        }

        return $this->redirect($this->generateUrl('panier'));
    }
}
