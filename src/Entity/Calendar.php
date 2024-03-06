<?php

namespace App\Entity;

use App\Repository\CalendarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CalendarRepository::class)]
class Calendar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    private ?string $today = null;

    #[ORM\Column(length: 20)]
    private ?string $morning = null;

    #[ORM\Column(length: 20)]
    private ?string $afternoon = null;

    #[ORM\Column(length: 25)]
    private ?string $allDay = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isMorning = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isAfternoon = null;

    #[ORM\Column(nullable: true)]
    private ?bool $isAllDay = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeMorning = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeAfternoon = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeAllDay = null;

    #[ORM\OneToMany(targetEntity: Tresse::class, mappedBy: 'calendar')]
    private Collection $tresse;

    public function __construct()
    {
        $this->tresse = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToday(): ?string
    {
        return $this->today;
    }

    public function setToday(string $today): static
    {
        $this->today = $today;

        return $this;
    }

    public function getMorning(): ?string
    {
        return $this->morning;
    }

    public function setMorning(string $morning): static
    {
        $this->morning = $morning;

        return $this;
    }

    public function getAfternoon(): ?string
    {
        return $this->afternoon;
    }

    public function setAfternoon(string $afternoon): static
    {
        $this->afternoon = $afternoon;

        return $this;
    }

    public function getAllDay(): ?string
    {
        return $this->allDay;
    }

    public function setAllDay(string $allDay): static
    {
        $this->allDay = $allDay;

        return $this;
    }

    public function isIsMorning(): ?bool
    {
        return $this->isMorning;
    }

    public function setIsMorning(?bool $isMorning): static
    {
        $this->isMorning = $isMorning;

        return $this;
    }

    public function isIsAfternoon(): ?bool
    {
        return $this->isAfternoon;
    }

    public function setIsAfternoon(?bool $isAfternoon): static
    {
        $this->isAfternoon = $isAfternoon;

        return $this;
    }

    public function isIsAllDay(): ?bool
    {
        return $this->isAllDay;
    }

    public function setIsAllDay(?bool $isAllDay): static
    {
        $this->isAllDay = $isAllDay;

        return $this;
    }

    public function getCodeMorning(): ?string
    {
        return $this->codeMorning;
    }

    public function setCodeMorning(?string $codeMorning): static
    {
        $this->codeMorning = $codeMorning;

        return $this;
    }

    public function getCodeAfternoon(): ?string
    {
        return $this->codeAfternoon;
    }

    public function setCodeAfternoon(?string $codeAfternoon): static
    {
        $this->codeAfternoon = $codeAfternoon;

        return $this;
    }

    public function getCodeAllDay(): ?string
    {
        return $this->codeAllDay;
    }

    public function setCodeAllDay(?string $codeAllDay): static
    {
        $this->codeAllDay = $codeAllDay;

        return $this;
    }

    /**
     * @return Collection<int, Tresse>
     */
    public function getTresse(): Collection
    {
        return $this->tresse;
    }

    public function addTresse(Tresse $tresse): static
    {
        if (!$this->tresse->contains($tresse)) {
            $this->tresse->add($tresse);
            $tresse->setCalendar($this);
        }

        return $this;
    }

    public function removeTresse(Tresse $tresse): static
    {
        if ($this->tresse->removeElement($tresse)) {
            // set the owning side to null (unless already changed)
            if ($tresse->getCalendar() === $this) {
                $tresse->setCalendar(null);
            }
        }

        return $this;
    }
}
