<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'activity')]
#[ORM\InheritanceType('JOINED')]
#[ORM\DiscriminatorColumn(name: 'type', type: 'string')]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    protected ?int $id;

    #[ORM\Column(type: 'integer')]
    protected ?int $amount;

    #[ORM\Column(type: 'string')]
    protected ?string $description;

    #[ORM\Column(type: 'text', nullable: true)]
    protected ?string $details;

    #[ORM\Column(type: 'date')]
    protected ?\DateTimeInterface $startDate;

    #[ORM\Column(type: 'date')]
    protected ?\DateTimeInterface $endDate;

    #[ORM\ManyToOne(targetEntity: AcademicYear::class, inversedBy: 'activities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AcademicYear $academicYear = null;

    #[ORM\ManyToOne(targetEntity: Professional::class, inversedBy: 'activities')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Professional $professional = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): Activity
    {
        $this->amount = $amount;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): Activity
    {
        $this->description = $description;
        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): Activity
    {
        $this->details = $details;
        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): Activity
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): Activity
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function getAcademicYear(): ?AcademicYear
    {
        return $this->academicYear;
    }

    public function setAcademicYear(?AcademicYear $academicYear): Activity
    {
        $this->academicYear = $academicYear;
        return $this;
    }

    public function getProfessional(): ?Professional
    {
        return $this->professional;
    }

    public function setProfessional(?Professional $professional): Activity
    {
        $this->professional = $professional;
        return $this;
    }
}