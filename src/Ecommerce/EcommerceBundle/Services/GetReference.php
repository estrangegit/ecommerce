<?php
namespace Ecommerce\EcommerceBundle\Services;

use Doctrine\ORM\EntityManager;
use Ecommerce\EcommerceBundle\Entity\Commandes;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class GetReference
{
    private $em;
    private $security;

    public function __construct(TokenStorageInterface $security, EntityManager $em)
    {
        $this->security = $security;
        $this->em = $em;
    }

    public function reference(){
        $reference = $this->em->getRepository(Commandes::class)->findOneBy(array('valider'=>true),
                                                                            array('id' => 'DESC'));

        if(!$reference)
            return 1;
        else
            return $reference->getReference() + 1;
    }

}