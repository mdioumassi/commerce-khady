<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(targetEntity: Wax::class, mappedBy: 'category', orphanRemoval: true)]
    private Collection $wax;

    public function __construct()
    {
        $this->wax = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Wax>
     */
    public function getWax(): Collection
    {
        return $this->wax;
    }

    public function addWax(Wax $wax): static
    {
        if (!$this->wax->contains($wax)) {
            $this->wax->add($wax);
            $wax->setCategory($this);
        }

        return $this;
    }

    public function removeWax(Wax $wax): static
    {
        if ($this->wax->removeElement($wax)) {
            // set the owning side to null (unless already changed)
            if ($wax->getCategory() === $this) {
                $wax->setCategory(null);
            }
        }

        return $this;
    }
}
