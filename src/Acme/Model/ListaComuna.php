<?php

namespace Acme\Model;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Acme\StoreBundle\Entity\Comuna;
use Acme\StoreBundle\Form\ComunaType;

class ListaComuna
{
    private $repository;

    public function __construct(ObjectManager $om)
    {
        $this->repository = $om->getRepository('AcmeStoreBundle:Comuna');
    }

    public function listarComuna(){
        return $this->repository->findAll();
    }

}
