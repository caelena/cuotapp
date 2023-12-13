<?php

namespace App\Entity;

use App\Entity\Activity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'annual_activity')]
class AnnualActivity extends Activity
{

}