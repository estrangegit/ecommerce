<?php

namespace Utilisateurs\UtilisateursBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Utilisateurs\UtilisateursBundle\Entity\Utilisateurs;


class UtilisateursAdminController extends Controller
{
    public function indexAction(){

        $em = $this->getDoctrine()->getManager();
        $utilisateurs = $em->getRepository(Utilisateurs::class)->findAll();

        return $this->render('@Utilisateurs/Administration/Utilisateurs/layout/index.html.twig', array('utilisateurs' => $utilisateurs));
    }

    public function utilisateurAction($id, Request $request){

        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository(Utilisateurs::class)->find($id);

        $route = $request->get('_route');

        if($route == 'adminAdressesUtilisateurs')
            return $this->render('@Utilisateurs/Administration/Utilisateurs/layout/adresses.html.twig', array('utilisateur' => $utilisateur));
        elseif ($route == 'adminFacturesUtilisateurs')
            return $this->render('@Utilisateurs/Administration/Utilisateurs/layout/factures.html.twig', array('utilisateur' => $utilisateur));
        else
            throw $this->createNotFoundException("La vue n'existe pas");
    }
}
