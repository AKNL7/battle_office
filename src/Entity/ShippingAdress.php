<?php

namespace App\Entity;

use App\Repository\ShippingAdressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShippingAdressRepository::class)]
class ShippingAdress
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adress_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $zip_code = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress_option = null;

    #[ORM\OneToOne(mappedBy: 'shippingAdress', cascade: ['persist', 'remove'])]
    private ?Order $order_adress = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdressName(): ?string
    {
        return $this->adress_name;
    }

    public function setAdressName(string $adress_name): static
    {
        $this->adress_name = $adress_name;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    public function setZipCode(?string $zip_code): static
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAdressOption(): ?string
    {
        return $this->adress_option;
    }

    public function setAdressOption(?string $adress_option): static
    {
        $this->adress_option = $adress_option;

        return $this;
    }

    public function getOrderAdress(): ?Order
    {
        return $this->order_adress;
    }

    public function setOrderAdress(?Order $order_adress): static
    {
        // unset the owning side of the relation if necessary
        if ($order_adress === null && $this->order_adress !== null) {
            $this->order_adress->setShippingAdress(null);
        }

        // set the owning side of the relation if necessary
        if ($order_adress !== null && $order_adress->getShippingAdress() !== $this) {
            $order_adress->setShippingAdress($this);
        }

        $this->order_adress = $order_adress;

        return $this;
    }
}
