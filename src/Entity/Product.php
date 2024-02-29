<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    private ?User $user = null;

    #[ORM\OneToOne(mappedBy: 'product', cascade: ['persist', 'remove'])]
    private ?Wax $wax = null;

    #[ORM\OneToOne(mappedBy: 'product', cascade: ['persist', 'remove'])]
    private ?Savon $savon = null;

    #[ORM\OneToOne(mappedBy: 'product', cascade: ['persist', 'remove'])]
    private ?Tresse $tresse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getWax(): ?Wax
    {
        return $this->wax;
    }

    public function setWax(Wax $wax): static
    {
        // set the owning side of the relation if necessary
        if ($wax->getProduct() !== $this) {
            $wax->setProduct($this);
        }

        $this->wax = $wax;

        return $this;
    }

    public function getSavon(): ?Savon
    {
        return $this->savon;
    }

    public function setSavon(Savon $savon): static
    {
        // set the owning side of the relation if necessary
        if ($savon->getProduct() !== $this) {
            $savon->setProduct($this);
        }

        $this->savon = $savon;

        return $this;
    }

    public function getTresse(): ?Tresse
    {
        return $this->tresse;
    }

    public function setTresse(Tresse $tresse): static
    {
        // set the owning side of the relation if necessary
        if ($tresse->getProduct() !== $this) {
            $tresse->setProduct($this);
        }

        $this->tresse = $tresse;

        return $this;
    }
}
