<?php

namespace FindBack\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * PlaceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class WantedRepository extends EntityRepository
{
    public function search($formData)
    {
        $place = $formData->getPlace();
        $date  = $formData->getDate();

        $q = $this->createQueryBuilder('w')
            ->where('w.place = :place')
            ->setParameter('place', $place->getId())
            ->andWhere('w.date = :date')
            ->setParameter('date', $date->getId());

        if($place->getEstablishmentName()) {
            //$q->join('')
        }

        $result = $q->getQuery()->getResult();
        if(sizeof($result) > 0)
            return $result;
        else
            return false;
    }
}