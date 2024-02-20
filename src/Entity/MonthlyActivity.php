<?php

namespace App\Entity;

use App\Entity\Activity;
use App\Repository\MonthlyActivityRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonthlyActivityRepository::class)]
#[ORM\Table(name: 'monthly_activity')]
class MonthlyActivity extends Activity
{

}