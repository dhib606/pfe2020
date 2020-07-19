<?php

namespace App\Form;

use App\Entity\Media;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MediaType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title', TextType::class, ['label' => 'Titre', 'attr' => ['placeholder' => 'Titre']])
                ->add('content', TextareaType::class, ['label' => 'Description', 'attr' => ['placeholder' => 'Description']])
                ->add('nameFile', FileType::class, ['label' => 'Media', 'attr' => ['placeholder' => 'Media']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }

}
