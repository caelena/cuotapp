<?php

namespace App\Entity;

use App\Entity\Activity;
use App\Repository\WeeklyActivityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeeklyActivityRepository::class)]
#[ORM\Table(name: 'weekly_activity')]
class WeeklyActivity extends Activity
{
    const SUNDAY = 0;
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;

    #[ORM\Column(type: 'integer')]
    private ?int $dayOfWeek;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $startHour;

    #[ORM\Column(type: 'time')]
    private ?\DateTimeInterface $endHour;

    public function getDayOfWeek(): ?int
    {
        return $this->dayOfWeek;
    }

    public function setDayOfWeek(?int $dayOfWeek): WeeklyActivity
    {
        $this->dayOfWeek = $dayOfWeek;
        return $this;
    }

    public function getStartHour(): ?\DateTimeInterface
    {
        return $this->startHour;
    }

    public function setStartHour(?\DateTimeInterface $startHour): WeeklyActivity
    {
        $this->startHour = $startHour;
        return $this;
    }

    public function getEndHour(): ?\DateTimeInterface
    {
        return $this->endHour;
    }

    public function setEndHour(?\DateTimeInterface $endHour): WeeklyActivity
    {
        $this->endHour = $endHour;
        return $this;
    }
}