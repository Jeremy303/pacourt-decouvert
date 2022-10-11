<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Partenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RoleInscriptionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'roles',
                ChoiceType::class,
                [
                    'label' => 'Roles',
                    'choices'  => [
                        'Prescripteur' => 'ROLE_PRESCRIPTEUR',
                        'Organisateur' => 'ROLE_ORGANISATEUR',
                        'Provisoire' => 'provisoire',
                    ],
                ]
            )
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
                "label" => 'Nom',
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
                "label" => 'Prénom',
            ])
            ->add('organisme', TextType::class, [
                "label" => 'Nom de l\'organisme pré-renseigné',
                'disabled' => true,
            ])
            ->add('email', TextType::class, [
                "label" => 'Email',
                'disabled' => true,
            ])
            ->add('partenaire', EntityType::class, [
                'class' => Partenaire::class,
                "label" => 'Organisme',
                'choice_attr' => [
                    '0' => ['selected' => 'true', 'disabled' => 'disabled'],
                ],
            ]);
    }

    // public function configureOptions(OptionsResolver $resolver): void
    // {
    //     $resolver->setDefaults([
    //         'data_class' => User::class,
    //     ]);
    // }
}
