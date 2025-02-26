<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'form-input',
                ],
                'error_bubbling' => true,
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'placeholder' => 'Mot de passe',
                    'class' => 'form-input',
                    'pattern' => '^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$',
                    'title' => 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial (#?!@$ %^&*-)',
                ],
                'error_bubbling' => true,
            ])
            ->add('first_name', TextType::class, [
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'placeholder' => 'Prénom',
                    'class' => 'form-input',
                ],
                'error_bubbling' => true,
            ])
            ->add('last_name', TextType::class, [
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-input',
                ],
                'error_bubbling' => true,
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'required' => false,
                'attr' => [
                    'placeholder' => 'Adresse (optionnel)',
                    'class' => 'form-input',
                ],
                'error_bubbling' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
            'attr' => ['class' => 'form-container'],
        ]);
    }
}
