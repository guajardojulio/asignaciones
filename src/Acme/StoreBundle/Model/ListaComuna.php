<?php

namespace Acme\StoreBundle\Model;
use Doctrine\Common\Persistence\ObjectManager;


class ListaComuna
{
    private $repository;

    public function __construct(ObjectManager $om)
    {
        $this->repository = $om->getRepository('AcmeStoreBundle:Comuna');
    }

    public function last(){
        return $this->repository->findAll();
    }

}
