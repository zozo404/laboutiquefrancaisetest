<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label'=>'Votre prénom',
                'constraints'=> new Length(30, 2),
                'attr'=> [
                    'placeholder'=>'Merci de saisir votre prénom de bg'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label'=>'Votre nom',
                'constraints'=> new Length(30, 2),
                'attr'=> [
                    'placeholder'=>'Merci de saisir votre nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label'=>'Votre email',
                'constraints'=> new Length(30, 2),
                'attr'=> [
                    'placeholder'=>'Merci de saisir votre email'
                ]
            ])
            ->add('password', RepeatedType::class, [
                'type'=> PasswordType::class,
                'invalid_message'=> 'Les mots de passes doivent être identiques.',
                'label'=>'Votre mot de passe',
                'required'=>true,
                'first_options'=>[
                    'label'=>'Votre mot de passe',
                    'attr'=>[
                        'placeholder'=>'Donne moi ton mot de passe..'
                    ]
                ],
                'second_options'=>[
                    'label'=>'Confirmer le mot de passe',
                    'attr'=>[
                        'placeholder'=>'Confirme moi ton mot de passe..'
                    ]
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Clique ici le goat',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
