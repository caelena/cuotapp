<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'professional')]
class Professional
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\Column(type: 'integer')]
    private ?int $id;

    #[ORM\Column(type: 'string', unique: true)]
    private ?string $description;

    #[ORM\OneToMany(targetEntity: Activity::class, mappedBy: 'professional')]
    private Collection $activities;

    public function __construct()
    {
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

    public function setDescription(?string $description): Professional
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return Collection<int, Activity>
     */
    public function getActivities(): Collection
    {
        return $this->activities;
    }

    public function addActivity(Activity $activity): Professional
    {
        if (!$this->activities->contains($activity)) {
            $this->activities->add($activity);
            $activity->setProfessional($this);
        }
        return $this;
    }

    public function removeActivity(Activity $activity): Professional
    {
        if ($this->activities->removeElement($activity)) {
            $activity->setProfessional(null);
        }
        return $this;
    }

}