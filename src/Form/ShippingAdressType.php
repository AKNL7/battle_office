<?php

namespace App\Form;

use App\Entity\Order;
use App\Entity\ShippingAdress;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ShippingAdressType extends AbstractType
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
            ->add('order_adress', EntityType::class, [
                'class' => Order::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ShippingAdress::class,
        ]);
    }
}
