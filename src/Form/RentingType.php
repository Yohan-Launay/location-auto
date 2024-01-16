<?php

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Renting;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RentingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateStart')
            ->add('dateEnd')
            ->add('coefPrice')
            ->add('vehicle', EntityType::class, [
                'class' => Vehicle::class,
                'choice_label' => 'model',
            ])
            ->add('customer', EntityType::class, [
                'class' => Customer::class,
                'choice_label' => 'firstname',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Renting::class,
        ]);
    }
}
