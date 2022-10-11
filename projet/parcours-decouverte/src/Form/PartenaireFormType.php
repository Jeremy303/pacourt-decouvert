<?php

namespace App\Form;

use App\Entity\Partenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PartenaireFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('organisme', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => "/^[a-zA-Z]+([-\s'\/]?[a-zA-Z])+$/",
                        'message' => 'Charactère alphanumérique, trait d\'union, espace et apostrophe uniquement.',
                    ]),
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
                'label' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Partenaire::class,
        ]);
    }
}
