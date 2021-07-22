<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GameType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'nom du jeu',
                'attr' => ['placeholder' => 'Nom du jeu'],
                ])
            ->add('playerNumber', IntegerType::class, [
                'label' => 'Nombre de joueurs',
            ])
            ->add('minimumAge', IntegerType::class, [
                'label' => 'Age minimum',
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description du jeu",
                'attr' => ['placeholder' => 'Expliquer le jeu'],
            ])
            ->add('Category', EntityType::class, [
                'class' => Category::class,
                'multiple' => false,
                'expanded' => true,
                'label' => 'Catégorie'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Game::class,
        ]);
    }
}
