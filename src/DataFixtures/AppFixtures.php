<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\AcademicYearFactory;
use App\Factory\MemberFactory;
use App\Factory\NonSchoolDayFactory;
use App\Factory\ProfessionalFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

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
            'password' => $this->passwordHasher->hashPassword(new User(), 'admin'),
            'admin' => true
        ]);

        UserFactory::createOne([
            'userName' => 'chuck',
            'password' => $this->passwordHasher->hashPassword(new User(), 'norris'),
        ]);

        UserFactory::createMany(10, [
            'password' => $this->passwordHasher->hashPassword(new User(), 'test')
        ]);
        ProfessionalFactory::createMany(30);

        $manager->flush();
    }
}
