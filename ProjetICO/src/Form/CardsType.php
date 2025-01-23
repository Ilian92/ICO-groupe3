<?php
namespace App\Form;

use App\Entity\Cards;
use App\Entity\Packs;
use App\Entity\CardType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CardsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Name',
            ])
            ->add('description', TextType::class, [
                'label' => 'Description',
            ])
            ->add('type', EntityType::class, [
                'class' => CardType::class,
                'choice_label' => 'name',
                'label' => 'Type',
            ])
            ->add('quantity', IntegerType::class, [
                'label' => 'Quantity',
            ])
            ->add('image', TextType::class, [
                'label' => 'Image URL',
            ])
            ->add('pack', EntityType::class, [
                'class' => Packs::class,
                'choice_label' => 'name',
                'label' => 'Pack',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cards::class,
        ]);
    }
}