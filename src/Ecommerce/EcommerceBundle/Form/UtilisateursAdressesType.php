<?php

namespace Ecommerce\EcommerceBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateursAdressesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class, array('label'=>'Nom'))
                ->add('prenom', TextType::class, array('label'=>'Prénom'))
                ->add('telephone', TextType::class, array('label'=>'Téléphone'))
                ->add('adresse', TextType::class, array('label'=>'Adresse'))
                ->add('cp', TextType::class, array('label'=>'Code Postal', 'attr'=>array('class'=>'cp', 'maxlength' => 5)))
                ->add('ville', TextType::class, array('label'=>'Ville', 'attr'=>array('class'=>'ville')))
                ->add('pays', TextType::class, array('label'=>'Pays'))
                ->add('complement', TextType::class, array('label'=>'Complement', 'required'=>false))
                ->add('submit', SubmitType::class, array('label'=>'Enregistrer'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ecommerce_ecommercebundle_utilisateursadresses';
    }


}
