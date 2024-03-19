<?php

namespace App\Form;

use App\Entity\BillingAdress;
use App\Entity\Client;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\ShippingAdress;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('status')
            ->add('payment')
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'id',
            ])
            ->add('adress', EntityType::class, [
                'class' => BillingAdress::class,
                'choice_label' => 'id',
            ])
            ->add('shippingAdress', EntityType::class, [
                'class' => ShippingAdress::class,
                'choice_label' => 'id',
            ])
            ->add('productName', EntityType::class, [
                'class' => Product::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Order::class,
        ]);
    }
}
