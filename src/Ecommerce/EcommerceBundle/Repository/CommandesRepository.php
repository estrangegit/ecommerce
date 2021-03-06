<?php

namespace Ecommerce\EcommerceBundle\Repository;

/**
 * CommandesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommandesRepository extends \Doctrine\ORM\EntityRepository
{
    public function byFacture($utilisateur){
        $qb = $this->createQueryBuilder('c')
                    ->select('c')
                    ->where('c.utilisateur=:utilisateur')
                    ->andwhere('c.valider = 1')
                    ->orderBy('c.id')
                    ->setParameter('utilisateur',$utilisateur);

        return $qb->getQuery()->getResult();
    }

    public function byDateCommande($date){
        $qb = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.date > :date')
            ->andwhere('c.valider = 1')
            ->orderBy('c.id')
            ->setParameter('date',$date);

        return $qb->getQuery()->getResult();
    }
}
