<?php

namespace App\Form;

use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text', TextType::class, [
                'label' => 'Question'
            ])
            ->add('answers', CollectionType::class, [
                'entry_type' => AnswerType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'entry_options' => ['label' => false],
                'attr' => [
                    'data-controller' => 'form-collection',
                    'data-form-collection-add-label-value' => 'Ajouter une réponse',
                    'data-form-collection-delete-label-value' => 'Supprimer une réponse'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }
}
