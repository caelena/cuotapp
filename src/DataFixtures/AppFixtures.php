<?php

namespace App\DataFixtures;

use App\Factory\AcademicYearFactory;
use App\Factory\MemberFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        AcademicYearFactory::createOne([
            'description' => 'Curso 2022-2023',
            'startDate' => new \DateTime('2022-09-15'),
            'endDate' => new \DateTime('2023-06-30')
        ]);

        AcademicYearFactory::createOne([
            'description' => 'Curso 2023-2024',
            'startDate' => new \DateTime('2023-09-15'),
            'endDate' => new \DateTime('2024-06-30')
        ]);

        MemberFactory::createMany(20, function () {
            return [
                'academicYears' => AcademicYearFactory::randomRange(1, 2)
            ];
        });

        $manager->flush();
    }
}
