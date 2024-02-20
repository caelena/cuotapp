<?php

namespace App\Entity;

use App\Repository\NonSchoolDayRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NonSchoolDayRepository::class)]
#[ORM\Table(name: 'non_school_day')]
class NonSchoolDay
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $date;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $description;

    #[ORM\ManyToOne(targetEntity: AcademicYear::class, inversedBy: 'nonSchoolDays')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AcademicYear $academicYear = null;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): NonSchoolDay
    {
        $this->date = $date;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): NonSchoolDay
    {
        $this->description = $description;
        return $this;
    }

    public function getAcademicYear(): ?AcademicYear
    {
        return $this->academicYear;
    }

    public function setAcademicYear(?AcademicYear $academicYear): NonSchoolDay
    {
        $this->academicYear = $academicYear;
        return $this;
    }
}