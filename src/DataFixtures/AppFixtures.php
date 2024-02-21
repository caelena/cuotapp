<?php

namespace App\DataFixtures;

use App\Factory\AcademicYearFactory;
use App\Factory\MemberFactory;
use App\Factory\NonSchoolDayFactory;
use App\Factory\ProfessionalFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        AcademicYearFactory::createOne([
            'description' => '2022-2023',
            'startDate' => new \DateTime('2022-09-15'),
            'endDate' => new \DateTime('2023-06-30')
        ]);

        NonSchoolDayFactory::createOne([
            'description' => 'Día de Andalucía',
            'date' => new \DateTime('2023/02/28'),
            'academicYear' => AcademicYearFactory::find(['description' => '2022-2023'])
        ]);

        AcademicYearFactory::createOne([
            'description' => '2023-2024',
            'startDate' => new \DateTime('2023-09-15'),
            'endDate' => new \DateTime('2024-06-30')
        ]);

        NonSchoolDayFactory::createOne([
            'description' => 'Día de Andalucía',
            'date' => new \DateTime('2024/02/28'),
            'academicYear' => AcademicYearFactory::find(['description' => '2023-2024'])
        ]);

        MemberFactory::createMany(20, function () {
            return [
                'academicYears' => AcademicYearFactory::randomRange(1, 2)
            ];
        });

        UserFactory::createOne([
            'userName' => 'admin',
            'password' => 'admin',
            'admin' => true
        ]);

        UserFactory::createOne([
            'userName' => 'chuck',
            'password' => 'norris'
        ]);

        UserFactory::createMany(10);
        ProfessionalFactory::createMany(30);

        $manager->flush();
    }
}
