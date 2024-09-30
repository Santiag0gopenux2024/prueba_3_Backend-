<?php

declare(strict_types=1);

namespace App\Form;

use App\Document\LeaseContract;
use App\Document\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class LeaseContractType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lessee', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'name',
                'required' => true,
            ])
            ->add('monthlyRentAmount', NumberType::class, ['required' => true])
            ->add('propertyCode', TextType::class, ['required' => true]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LeaseContract::class,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return '';
    }
}