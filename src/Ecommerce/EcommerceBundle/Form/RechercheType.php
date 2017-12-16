<?php

namespace Ecommerce\EcommerceBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RechercheType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('recherche', TextType::class)
                ->add('submit', SubmitType::class, array('label'=>'Rechercher'));
    }

    public function getName(){
        return 'ecommerce_ecommercebundle_recherche';
    }
}