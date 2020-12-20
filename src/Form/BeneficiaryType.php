<?php

namespace App\Form;

use App\Entity\Beneficiary;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class BeneficiaryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('iban')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'username',
                'disabled' => 'true'
            ])

            
            // ->add(
            //     'city',
            //     EntityType::class, [
            //         'class' => User::class,
            //         'label' => 'User',
            //         'choice_label' => function () {
            //             return $this->security->getUser();
            //         },
            //         'expanded' => true,
            //         'attr' => [
            //             'class' => 'selectpicker',
            //         ],
            //     ]
            // );

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Beneficiary::class,
        ]);
    }
}
