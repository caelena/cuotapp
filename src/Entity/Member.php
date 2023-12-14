<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'member')]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string')]
    private ?string $firstName;

    #[ORM\Column(type: 'string')]
    private ?string $lastName;

    #[ORM\Column(type: 'string')]
    private ?string $address;

    #[ORM\Column(type: 'string')]
    private ?string $city;

    #[ORM\Column(type: 'string')]
    private ?string $zipCode;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $guardianFirstName;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $guardianLastName;

    #[ORM\Column(type: 'string')]
    private ?string $iban;

    #[ORM\Column(type: 'date', nullable: true)]
    private ?\DateTimeInterface $birthday;

    #[ORM\Column(type: 'string')]
    private ?string $membershipCardNumber;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $details;

    #[ORM\OneToMany(targetEntity: Fee::class, mappedBy: 'member')]
    private Collection $fees;

    #[ORM\ManyToMany(targetEntity: AcademicYear::class, inversedBy: 'members')]
    private Collection $academicYears;

    public function __construct()
    {
        $this->fees = new ArrayCollection();
        $this->academicYears = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): Member
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): Member
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): Member
    {
        $this->address = $address;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): Member
    {
        $this->city = $city;
        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): Member
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getGuardianFirstName(): ?string
    {
        return $this->guardianFirstName;
    }

    public function setGuardianFirstName(?string $guardianFirstName): Member
    {
        $this->guardianFirstName = $guardianFirstName;
        return $this;
    }

    public function getGuardianLastName(): ?string
    {
        return $this->guardianLastName;
    }

    public function setGuardianLastName(?string $guardianLastName): Member
    {
        $this->guardianLastName = $guardianLastName;
        return $this;
    }

    public function getIban(): ?string
    {
        return $this->iban;
    }

    public function setIban(?string $iban): Member
    {
        $this->iban = $iban;
        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): Member
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function getMembershipCardNumber(): ?string
    {
        return $this->membershipCardNumber;
    }

    public function setMembershipCardNumber(?string $membershipCardNumber): Member
    {
        $this->membershipCardNumber = $membershipCardNumber;
        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): Member
    {
        $this->details = $details;
        return $this;
    }

    /**
     * @return Collection<int, Fee>
     */
    public function getFees(): Collection
    {
        return $this->fees;
    }

    /**
     * @return Collection<int, AcademicYear>
     */
    public function getAcademicYears(): Collection
    {
        return $this->academicYears;
    }

    public function addAcademicYear(AcademicYear $academicYear): Member
    {
        if (!$this->getAcademicYears()->contains($academicYear)) {
            $this->getAcademicYears()->add($academicYear);
            $academicYear->getMembers()->add($this);
        }
        return $this;
    }

    public function removeAcademicYear(AcademicYear $academicYear): Member
    {
        if ($this->getAcademicYears()->contains($academicYear)) {
            $this->getAcademicYears()->remove($academicYear);
            $academicYear->getMembers()->remove($this);
        }
        return $this;
    }

}