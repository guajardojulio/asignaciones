<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Acme\StoreBundle\Entity\User;
use Acme\StoreBundle\Form\UserType;

class UserController extends Controller
{
    public function indexAction()
    {
        $em =$this->getDoctrine()->getManager();
        $users = $em->getRepository('AcmeStoreBundle:User')->findAll();
        return $this->render('AcmeStoreBundle:User:index.html.twig',array("users"=>$users));
    }

    public function addAction()
    {
        $objUser = new User();
        $form = $this->createCreateForm($objUser);
        return $this->render('AcmeStoreBundle:User:add.html.twig',array('form' => $form->createView()));
    }

    public function createCreateForm(User $entity)
    {
        $form = $this->createForm(UserType::class , $entity, array(
            'action' => $this->generateUrl('acme_store_user_create'),
             'method' => 'POST'
         ));
        return $form;
    }

    public function add2Action()
    {
        $objUser = new User();
        $form = $this->createFormBuilder($objUser)
             ->setAction($this->generateUrl('acme_store_user_create2'))
             ->setMethod('POST')
             ->add('NombreUsuario')
             ->add('Clave')
             ->add('NombreCompleto')
             ->add('IdRol')
             ->add('Estado',ChoiceType::class, array(
                 'choices'  => array(
                     'ACTIVO' => 'ACTIVO','INACTIVO' => 'INACTIVO')))
             ->add('save',SubmitType::class,array('label'=>'Save user'))
             ->getForm();

         return $this->render('AcmeStoreBundle:User:add.html.twig',array('form' => $form->createView()));
    }

    public function createAction(Request $request)
    {
        $objUser = new User();
        $form = $this->createCreateForm($objUser);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($objUser);
            $em->flush();
            return $this->redirectToRoute('acme_store_user_index');
        }
        return $this->redirectToRoute('acme_store_homepage');
        //return $this->render('AcmeStoreBundle:User:add.html.twig',array('form'=>$form->createView()));
    }

    public function create2Action(Request $request)
    {
        $objUser = new User();
        //$form = $this->createCreateForm($user);
        $form = $this->createForm(UserType::class , $objUser);
        $form->handleRequest($request);

       // if($form->isValid())
       // {
            $em=$this->getDoctrine()->getManager();
            $em->persist($objUser);
            $em->flush();

            return $this->redirectToRoute('acme_store_user_index');
      //  }

       // return $this->redirectToRoute('acme_store_homepage');
        //return $this->render('AcmeStoreBundle:User:add.html.twig',array('form'=>$form->createView()));
    }

    public function viewAction($id){
        $repository = $this->getDoctrine()->getRepository('AcmeStoreBundle:User');
        $user = $repository->find($id);
        return new Response('Usuario:'. $user->getnombrecompleto());
    }
}
