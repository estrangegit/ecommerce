<?php

namespace Ecommerce\EcommerceBundle\Controller;

use Ecommerce\EcommerceBundle\Entity\Commandes;
use Ecommerce\EcommerceBundle\Entity\Produits;
use Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses;
use Ecommerce\EcommerceBundle\Services\GetReference;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CommandesController extends Controller
{

    public function facture(SessionInterface $session){
        $em = $this->getDoctrine()->getManager();

        $adresse = $session->get('adresse');
        $panier = $session->get('panier');

        $commande = array();

        $totalHT = 0;
        $totalTVA = 0;

        $facturation = $em->getRepository(UtilisateursAdresses::class)->find($adresse['facturation']);
        $livraison = $em->getRepository(UtilisateursAdresses::class)->find($adresse['livraison']);

        $produits = $em->getRepository(Produits::class)->findArray(array_keys($session->get('panier')));

        /** @var Produits $produit */

        foreach ($produits as $produit){
            $prixHT = $produit->getPrix() * $panier[$produit->getId()];
            $prixTTC = $produit->getPrix() * $panier[$produit->getId()] / $produit->getTva()->getMultiplicate();
            $totalHT += $prixHT;

            if(!isset($commande['tva']['%'.$produit->getTva()->getValeur()])){
                $commande['tva']['%'.$produit->getTva()->getValeur()] = round($prixTTC - $prixHT, 2);
            }else{
                $commande['tva']['%'.$produit->getTva()->getValeur()] += round($prixTTC - $prixHT, 2);
            }

            $totalTVA += round($prixTTC - $prixHT, 2);

            $commande['produits'][$produit->getId()]= array('reference' => $produit->getNom(),
                                                            'quantite' => $panier[$produit->getId()],
                                                            'prixHT' => round($produit->getPrix(),2),
                                                            'prixTTC' => round($produit->getPrix()/$produit->getTva()->getMultiplicate(), 2));

        }
        $commande['livraison'] = array('prenom' => $livraison->getPrenom(),
            'nom' => $livraison->getNom(),
            'telephone' => $livraison->getTelephone(),
            'adresse' => $livraison->getAdresse(),
            'cp' => $livraison->getCp(),
            'ville' => $livraison->getVille(),
            'pays' => $livraison->getPays(),
            'complement' => $livraison->getComplement());

        $commande['facturation'] = array('prenom' => $facturation->getPrenom(),
            'nom' => $facturation->getNom(),
            'telephone' => $facturation->getTelephone(),
            'adresse' => $facturation->getAdresse(),
            'cp' => $facturation->getCp(),
            'ville' => $facturation->getVille(),
            'pays' => $facturation->getPays(),
            'complement' => $facturation->getComplement());

        $commande['totalHT'] = round($totalHT, 2);
        $commande['totalTTC'] = round($totalHT + $totalTVA, 2);
        $commande['token'] = base64_encode(random_bytes(20));

        return $commande;
    }


    public function prepareCommandeAction(SessionInterface $session){

        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        if(!$session->has('commande')){
            $commande = new Commandes();
        }else{
            $commande = $em->getRepository(Commandes::class)->find($session->get('commande'));
        }

        $commande->setDate(new \ DateTime());
        $commande->setUtilisateur($user);
        $commande->setValider(0);
        $commande->setReference(0);
        $commande->setCommande($this->facture($session));

        if(!$session->has('commande')){
            $em->persist($commande);
            $session->set('commande', $commande);
        }

        $em->flush();

        return new Response($commande->getId());
    }

    /*
     * Cette méthode remplace une api bancaire à définir
     */
    public function validationCommandeAction(Commandes $commande, SessionInterface $session){

        $em = $this->getDoctrine()->getManager();

        if(!$commande || $commande->getValider() == 1){
            throw $this->createNotFoundException("La commande n'existe pas");
        }

        $commande->setValider(1);
        $commande->setReference($this->container->get(GetReference::class)->reference());

        $em->flush();

        $session->remove('adresse');
        $session->remove('panier');
        $session->remove('commande');

        //Ici le mail de validation
        $message = \Swift_Message::newInstance()
            ->setSubject('Validation de votre commande')
            ->setFrom(array($this->getParameter('mailer_user') => "Fruits&Legumes"))
            ->setTo($commande->getUtilisateur()->getEmailCanonical())
            ->setCharset('utf-8')
            ->setContentType('text/html')
            ->setBody($this->renderView('EcommerceBundle:Default:SwiftLayout/validationCommande.html.twig',
                array('utilisateur' => $commande->getUtilisateur())));

        $this->get('mailer')->send($message);

        $this->addFlash('success',"Votre commande a été validée avec succès");

        return $this->redirectToRoute('factures');
    }
}
