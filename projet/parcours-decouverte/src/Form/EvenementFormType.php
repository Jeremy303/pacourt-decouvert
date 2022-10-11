<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EvenementFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'constraints' => [
                    // new Regex([
                    //     'pattern' => "/^[a-zA-Z]+([-\s']?[a-zA-Z])+$/",
                    //     'message' => 'Charactère alphanumérique, trait d\'union, espace et apostrophe uniquement.',
                    // ]),
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ]),
                ],
                'label' => false,
            ])

            ->add('debut', DateType::class, [
                'widget' => 'single_text',
                'label' => false
            ])

            ->add('fin', DateType::class, [
                'widget' => 'single_text',
                'label' => false
            ])

            ->add('adresse', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ]),
                ],
                'label' => false,
            ])
            ->add('codePostal', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ]),

                ],
                'label' => false,
            ])

            ->add('ville', TextType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ]),
                ],
                'label' => false,
            ])

            ->add('places', NumberType::class, [
                "label" => false,
                'constraints' => [
                    new Regex([
                        'pattern' => "/^\d+$/",
                        'message' => 'Chiffres uniquement.',
                    ]),
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ])
                ],
            ])

            ->add('description', TextareaType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Ce champ est obligatoire.',
                    ]),
                ]

            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
