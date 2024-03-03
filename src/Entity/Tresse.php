<?php

namespace App\Entity;

use App\Repository\TresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TresseRepository::class)]
class Tresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true, options: ['default' => false])]
    private ?bool $isMove = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $myAddress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $yourAddress = null;

    #[ORM\Column(nullable: true)]
    private ?int $movePrice = null;

    #[ORM\Column(nullable: true)]
    private ?int $numberPerson = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $gender = null;

    #[ORM\OneToOne(inversedBy: 'tresse', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $product = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsMove(): ?bool
    {
        return $this->isMove;
    }

    public function setIsMove(?bool $isMove): static
    {
        $this->isMove = $isMove;

        return $this;
    }

    public function getMyAddress(): ?string
    {
        return $this->myAddress;
    }

    public function setMyAddress(?string $myAddress): static
    {
        $this->myAddress = $myAddress;

        return $this;
    }

    public function getYourAddress(): ?string
    {
        return $this->yourAddress;
    }

    public function setYourAddress(?string $yourAddress): static
    {
        $this->yourAddress = $yourAddress;

        return $this;
    }

    public function getMovePrice(): ?int
    {
        return $this->movePrice;
    }

    public function setMovePrice(?int $movePrice): static
    {
        $this->movePrice = $movePrice;

        return $this;
    }

    public function getNumberPerson(): ?int
    {
        return $this->numberPerson;
    }

    public function setNumberPerson(?int $numberPerson): static
    {
        $this->numberPerson = $numberPerson;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(?string $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): static
    {
        $this->product = $product;

        return $this;
    }
}
