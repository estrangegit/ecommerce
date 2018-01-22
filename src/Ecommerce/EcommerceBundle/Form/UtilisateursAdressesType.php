<?php

namespace Ecommerce\EcommerceBundle\Form;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Utilisateurs\UtilisateursBundle\Entity\Villes;

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
                ->add('ville', ChoiceType::class, array('label'=>'Ville', 'attr'=>array('required'=>'required', 'class'=>'ville')))
                ->add('pays', TextType::class, array('label'=>'Pays'))
                ->add('complement', TextType::class, array('label'=>'Complement', 'required'=>false))
                ->add('submit', SubmitType::class, array('label'=>'Enregistrer'));


        $em = $options['em'];

        $formModifier = function(FormInterface $form, $cp, $em){
            /** @var $em EntityManager  */
            $villesTemp = $em->getRepository(Villes::class)->findBy(array('villeCodePostal'=>$cp));

            $villes = array();

            foreach ($villesTemp as $ville){
                $villes[ucfirst($ville->getVilleNomReel())] = ucfirst($ville->getVilleNomReel());
            }

            $form->add('ville', ChoiceType::class, array(
                'label' => 'Ville',
                'placeholder' => false,
                'choices' => $villes,
                'attr'=>array('required'=>'required', 'class'=>'ville')
            ));
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use($formModifier, $em) {
                $form = $event->getForm();
                $data = $event->getData();
                $formModifier($form, $data, $em);
            }
        );

        $builder->get('cp')->addEventListener(FormEvents::POST_SUBMIT, function(FormEvent $event) use ($formModifier, $em){
            $formModifier($event->getForm()->getParent(), $event->getForm()->getData(), $em);
        });
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses',
        ));

        $resolver->setRequired('em');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ecommerce_ecommercebundle_utilisateursadresses';
    }
}
