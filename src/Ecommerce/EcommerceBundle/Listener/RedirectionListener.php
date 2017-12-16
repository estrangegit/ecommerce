<?php
namespace Ecommerce\EcommerceBundle\Listener;


use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListener
{
    public function __construct(ContainerInterface $container, Session $session)
    {
        $this->session = $session;
        $this->router = $container->get('router');
        $this->securityAuthorisationChecker = $container->get('security.authorization_checker');
        $this->securityTokenStorage = $container->get('security.token_storage');
    }

    public function onKernelRequest(GetResponseEvent $event)
    {

        $route = $event->getRequest()->attributes->get('_route');

        if( ($route == 'livraison' || $route == 'validation')){
            if ($this->session->has('panier'))
                if(count($this->session->get('panier')) == 0)
                    $event->setResponse(new RedirectResponse($this->router->generate('panier')));

            if(!is_object($this->securityTokenStorage->getToken()->getUser())){
                $this->session->getFlashBag()->add('notification','Vous devez vous identifier');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }

        if( ($route == 'factures')){
            if(!is_object($this->securityTokenStorage->getToken()->getUser())){
                $this->session->getFlashBag()->add('notification','Vous devez vous identifier');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }
    }
}