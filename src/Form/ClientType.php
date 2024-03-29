<?php

namespace App\Form;

use App\Entity\BillingAdress;
use App\Entity\Client;
use App\Entity\ShippingAdress;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('phone')
            ->add('billing', BillingAdressType::class)
         
             // quelque chose);
     
            // ->add('adress_name'
            // , ShippingAdressType::class) // quelque chose);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
            // 'data_class' => BillingAdress::class, 
         
        ]);
    }
}
