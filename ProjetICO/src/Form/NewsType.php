<?php

namespace App\Form;

use App\Entity\News;
use App\Entity\NewsStatus;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('image')
            ->add('start_date', null, [
                'widget' => 'single_text'
            ])
            ->add('end_date', null, [
                'widget' => 'single_text'
            ])
            ->add('created_at', null, [
                'widget' => 'single_text'
            ])
            ->add('updated_at', null, [
                'widget' => 'single_text'
            ])
            ->add('status_id', EntityType::class, [
                'class' => NewsStatus::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => News::class,
        ]);
    }
}
