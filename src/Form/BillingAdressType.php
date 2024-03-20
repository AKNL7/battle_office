<?php

namespace App\Form;

use App\Entity\BillingAdress;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BillingAdressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adress_name')
            ->add('city')
            ->add('zip_code')
            ->add('country')
            ->add('phone')
            ->add('adress_option')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BillingAdress::class,
        ]);
    }
}
