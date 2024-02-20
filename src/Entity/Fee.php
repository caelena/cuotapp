<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'fee')]
class Fee
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'integer')]
    private ?int $amount;

    #[ORM\Column(type: 'string')]
    private ?string $concept;

    #[ORM\Column(type: 'boolean')]
    private ?bool $paid;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $details;

    #[ORM\Column(type: 'date')]
    private ?\DateTimeInterface $issueDate;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $chargeDate;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $rejectionDate;

    #[ORM\Column(type: 'integer')]
    private ?int $extraAmount;

    #[ORM\ManyToOne(targetEntity: Member::class, inversedBy: 'fees')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Member $member;

    #[ORM\ManyToOne(targetEntity: AcademicYear::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?AcademicYear $academicYear = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): Fee
    {
        $this->amount = $amount;
        return $this;
    }

    public function getConcept(): ?string
    {
        return $this->concept;
    }

    public function setConcept(?string $concept): Fee
    {
        $this->concept = $concept;
        return $this;
    }

    public function getPaid(): ?bool
    {
        return $this->paid;
    }

    public function setPaid(?bool $paid): Fee
    {
        $this->paid = $paid;
        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): Fee
    {
        $this->details = $details;
        return $this;
    }

    public function getIssueDate(): ?\DateTimeInterface
    {
        return $this->issueDate;
    }

    public function setIssueDate(?\DateTimeInterface $issueDate): Fee
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    public function getChargeDate(): ?\DateTimeInterface
    {
        return $this->chargeDate;
    }

    public function setChargeDate(?\DateTimeInterface $chargeDate): Fee
    {
        $this->chargeDate = $chargeDate;
        return $this;
    }

    public function getRejectionDate(): ?\DateTimeInterface
    {
        return $this->rejectionDate;
    }

    public function setRejectionDate(?\DateTimeInterface $rejectionDate): Fee
    {
        $this->rejectionDate = $rejectionDate;
        return $this;
    }

    public function getExtraAmount(): ?int
    {
        return $this->extraAmount;
    }

    public function setExtraAmount(?int $extraAmount): Fee
    {
        $this->extraAmount = $extraAmount;
        return $this;
    }

    public function getMember(): ?Member
    {
        return $this->member;
    }

    public function setMember(?Member $member): Fee
    {
        $this->member = $member;
        return $this;
    }

    public function getAcademicYear(): ?AcademicYear
    {
        return $this->academicYear;
    }

    public function setAcademicYear(?AcademicYear $academicYear): Fee
    {
        $this->academicYear = $academicYear;
        return $this;
    }
}