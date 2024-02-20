<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'academic_year')]
class AcademicYear
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string')]
    private ?string $description;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $startDate;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $endDate;

    #[ORM\ManyToMany(targetEntity: Member::class, mappedBy: 'academicYears')]
    private Collection $members;

    #[ORM\OneToMany(targetEntity: NonSchoolDay::class, mappedBy: 'academicYear')]
    #[ORM\OrderBy(['date' => 'ASC'])]
    private Collection $nonSchoolDays;

    #[ORM\OneToMany(targetEntity: Fee::class, mappedBy: 'academicYear')]
    #[ORM\OrderBy(['issueDate' => 'ASC'])]
    private Collection $fees;

    #[ORM\OneToMany(targetEntity: Activity::class, mappedBy: 'academicYear')]
    #[ORM\OrderBy(['startDate' => 'ASC', 'endDate' => 'ASC'])]
    private Collection $activities;

    public function __construct()
    {
        $this->members = new ArrayCollection();
        $this->nonSchoolDays = new ArrayCollection();
        $this->fees = new ArrayCollection();
        $this->activities = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): AcademicYear
    {
        $this->description = $description;
        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): AcademicYear
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): AcademicYear
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return Collection<int, Member>
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): AcademicYear
    {
        if (!$this->getMembers()->contains($member)) {
            $this->getMembers()->add($member);
            $member->addAcademicYear($this);
        }
        return $this;
    }

    public function removeMember(Member $member): AcademicYear
    {
        if ($this->getMembers()->contains($member)) {
            $this->getMembers()->remove($member);
            $member->removeAcademicYear($this);
        }
        return $this;
    }

    /**
     * @return Collection<int, NonSchoolDay>
     */
    public function getNonSchoolDays(): Collection
    {
        return $this->nonSchoolDays;
    }

    public function addNonSchoolDay(NonSchoolDay $nonSchoolDay): AcademicYear
    {
        if (!$this->nonSchoolDays->contains($nonSchoolDay)) {
            $this->nonSchoolDays->add($nonSchoolDay);
            $nonSchoolDay->setAcademicYear($this);
        }

        return $this;
    }
    public function removeNonSchoolDay(NonSchoolDay $nonSchoolDay): AcademicYear
    {
        if ($this->nonSchoolDays->removeElement($nonSchoolDay)) {
            $nonSchoolDay->setAcademicYear(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, Fee>
     */
    public function getFees(): Collection
    {
        return $this->fees;
    }


    public function addFee(Fee $fee): AcademicYear
    {
        if (!$this->fees->contains($fee)) {
            $this->fees->add($fee);
            $fee->setAcademicYear($this);
        }

        return $this;
    }
    public function removeFee(Fee $fee): AcademicYear
    {
        if ($this->fees->removeElement($fee)) {
            $fee->setAcademicYear(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }


    public function addActivity(Activity $activity): AcademicYear
    {
        if (!$this->activities->contains($activity)) {
            $this->activities->add($activity);
            $activity->setAcademicYear($this);
        }

        return $this;
    }
    public function removeActivity(Activity $activity): AcademicYear
    {
        if ($this->activities->removeElement($activity)) {
            $activity->setAcademicYear(null);
        }

        return $this;
    }
}