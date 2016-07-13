<?php

namespace Acme\StoreBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\IntegerType;



class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreUsuario')
            ->add('clave')
            ->add('nombreCompleto')
            ->add('idRol')
            ->add('estado')
            ->add('save',SubmitType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Acme\StoreBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'User';
    }
}
