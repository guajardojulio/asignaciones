<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Acme\StoreBundle\Entity\Comuna;
use Acme\StoreBundle\Form\ComunaType;
use Acme\StoreBundle\Model;


class ComunaController extends Controller
{
    public function indexAction(Request $request)
    {
        $em =$this->getDoctrine()->getManager();
        #$objComuna = $em->getRepository('AcmeStoreBundle:Comuna')->findAll();

        $dql="select c from AcmeStoreBundle:Comuna c order by c.idComuna desc";
        $objComuna=$em->createQuery($dql);

        $paginator=$this->get('knp_paginator');
        $pagination=$paginator->paginate(
          $objComuna,$request->query->getInt('page',1),3
        );

        $deleteFormAjax = $this->createCustomForm(':USER_ID','DELETE','acme_store_comuna_delete');

        return $this->render('AcmeStoreBundle:Comuna:index.html.twig',array("pagination"=>$pagination,'delete_form_ajax'=>$deleteFormAjax->createView()));
    }

    public function listAction()
    {
        #$objComuna=$this->get('AcmeStoreBundle.ListaComuna');
        #$em =$this->getDoctrine()->getManager();
        $objComuna = $this->get('AcmeStoreBundle.lista_comuna')->last();
        return new Response('<pre>'.print_r($objComuna,true).'</pre>');
    }

    private function createCustomForm($id,$method,$route)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl($route,array('id'=>$id)))
            ->setMethod($method)
            ->getForm();
    }


    public function addAction(Request $request)
    {
        $objComuna = new Comuna();
        $form = $this->createForm(ComunaType::class,$objComuna);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($objComuna);
            $em->flush();

            $this->addFlash('mensaje','La comuna ha sido creada');

            return $this->redirectToRoute('acme_store_comuna_index');
        }
        return $this->render('AcmeStoreBundle:Comuna:add.html.twig',array('form' => $form->createView()));
    }

   /* public function createAction(Request $request)
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
    }*/

    public function viewAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('AcmeStoreBundle:Comuna');
        $objComuna = $repository->find($id);
        if(!$objComuna)
        {
            throw $this->createNotFoundException('Comuna no encontrada!');
        }
        //$deleteForm = $this->createDeleteForm($objComuna);
        $deleteForm = $this->createCustomForm($objComuna->getIdComuna(),'DELETE','acme_store_comuna_delete');
        return $this->render('AcmeStoreBundle:Comuna:view.html.twig',array('comuna' => $objComuna,'delete_form'=>$deleteForm->createView()));
        //return new Response('Comuna:'. $objComuna->getNombreComuna());
    }

    private function createDeleteForm($objComuna)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('acme_store_comuna_delete',array('id'=>$objComuna->getIdComuna())))
            ->setMethod('DELETE')
            ->getForm();
    }
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $objComuna=$em->getRepository('AcmeStoreBundle:Comuna')->find($id);
        if(!$objComuna) {
            throw $this->createNotFoundException('Comuna no encontrada!');
        }
        $allComuna = $em->getRepository('AcmeStoreBundle:Comuna')->findAll();
        $countComuna = count($allComuna);
        //$form = $this->createDeleteForm($objComuna);
        $form = $this->createCustomForm($objComuna->getIdComuna(),'DELETE','acme_store_comuna_delete');
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            if($request->isXmlHttpRequest())
            {
                $res = $this->deleteComuna($em,$objComuna);
                return new Response(
                    json_encode(array('removed'=>$res['removed'],'message'=>$res['message'],'countComuna'=>$countComuna)),
                        200,
                        array('Content-Type'=>'application/json')
                );
            }
            $res = $this->deleteComuna($em,$objComuna);
            /*$em->remove($objComuna);
            $em->flush();*/
            $this->addFlash($res['alert'],$res['message']);
            return $this->redirectToRoute('acme_store_comuna_index');
        }

    }
    private function deleteComuna($em, $comuna)
    {
        $em->remove($comuna);
        $em->flush();
        $message = 'El usuario ha sido eliminado';
        $remove = 1;
        $alert='mensaje';
        return array('removed'=>$remove,'message'=>$message,'alert'=>$alert);
    }
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $objComuna = $em->getRepository('AcmeStoreBundle:Comuna')->find($id);
        if(!$objComuna)
        {
            throw $this->createNotFoundException('Comuna no encontrada!');
        }

        $form = $this->createEditForm($objComuna);

        return $this->render('AcmeStoreBundle:Comuna:edit.html.twig',array('Comuna' => $objComuna,'form'=> $form->createView()));
    }

    private function createEditForm(Comuna $entity)
    {
        $form = $this->createForm(ComunaType::class,$entity,array('action' => $this->generateUrl('acme_store_comuna_update',array('id'=>$entity->getIdComuna())),'method'=>'PUT'));
        return $form;
    }

    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $objComuna = $em->getRepository('AcmeStoreBundle:Comuna')->find($id);
        if(!$objComuna)
        {
            throw $this->createNotFoundException('Comuna no encontrada!');
        }

        $form = $this->createEditForm($objComuna);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            $this->addFlash('mensaje','Comuna Actualizada!');
            return $this->redirectToRoute('acme_store_comuna_edit',array('id'=> $objComuna->getIdComuna()));
        }

    }
}
