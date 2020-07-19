<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'Nom')))
                ->add('email', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'E-mail')))
                ->add('subject', TextType::class, array('label' => false, 'attr' => array('placeholder' => 'Objet')))
                ->add('content', TextareaType::class, array('label' => false, 'attr' => array('placeholder' => 'Message')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }

}
