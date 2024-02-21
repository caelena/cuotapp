<?php

namespace App\Factory;

use App\Entity\NonSchoolDay;
use App\Repository\NonSchoolDayRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<NonSchoolDay>
 *
 * @method        NonSchoolDay|Proxy create(array|callable $attributes = [])
 * @method static NonSchoolDay|Proxy createOne(array $attributes = [])
 * @method static NonSchoolDay|Proxy find(object|array|mixed $criteria)
 * @method static NonSchoolDay|Proxy findOrCreate(array $attributes)
 * @method static NonSchoolDay|Proxy first(string $sortedField = 'id')
 * @method static NonSchoolDay|Proxy last(string $sortedField = 'id')
 * @method static NonSchoolDay|Proxy random(array $attributes = [])
 * @method static NonSchoolDay|Proxy randomOrCreate(array $attributes = [])
 * @method static NonSchoolDayRepository|RepositoryProxy repository()
 * @method static NonSchoolDay[]|Proxy[] all()
 * @method static NonSchoolDay[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static NonSchoolDay[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static NonSchoolDay[]|Proxy[] findBy(array $attributes)
 * @method static NonSchoolDay[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static NonSchoolDay[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class NonSchoolDayFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(NonSchoolDay $nonSchoolDay): void {})
        ;
    }

    protected static function getClass(): string
    {
        return NonSchoolDay::class;
    }
}
