<?php

namespace App\Form;

use App\Entity\Partenaire;
use App\Entity\User;
use Doctrine\Inflector\Rules\Pattern;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints\Unique;

class InscriptionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ]),
                    new Length([
                        'min' => 5,
                        "minMessage" => "trop petit",
                        'max' => 255,
                        "maxMessage" => "trop long",
                    ]),
                    // new UniqueEntity([
                    //     'fields' => ['email'],
                    //     'message' => 'Cette adresse est déjà utilisée.',
                    // ])
                ],
                "label" => false,
                "attr" =>  ["autocomplete" => "off"]
            ])
            ->add('organisme', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ]),
                    new Length([
                        'min' => 1,
                        "minMessage" => "trop petit",
                        'max' => 255,
                        "maxMessage" => "trop long",
                    ]),
                ],
                "label" => false,
            ])

            ->add('nom', TextType::class, [
                'constraints' => [
                    // new Regex([
                    //     'pattern' => "/^[a-zA-Z]+([-\s']?[a-zA-Z])+$/",
                    //     'message' => 'Charactère alphanumérique, trait d\'union, espace et apostrophe uniquement.',
                    // ]),
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ]),
                    new Length([
                        'min' => 1,
                        "minMessage" => "trop petit",
                        'max' => 255,
                        "maxMessage" => "trop long",
                    ]),
                ],
                "label" => false,
            ])
            ->add('prenom', TextType::class, [
                'constraints' => [
                    // new Regex([
                    //     'pattern' => "/^[a-zA-Z]+([-\s']?[a-zA-Z])+$/",
                    //     'message' => 'Charactère alphanumérique, trait d\'union, espace et apostrophe uniquement.',
                    // ]),
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ]),
                    new Length([
                        'min' => 1,
                        "minMessage" => "trop petit",
                        'max' => 255,
                        "maxMessage" => "trop long",
                    ]),
                ],
                "label" => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
