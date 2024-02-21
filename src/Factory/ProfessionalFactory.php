<?php

namespace App\Factory;

use App\Entity\Professional;
use App\Repository\ProfessionalRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Professional>
 *
 * @method        Professional|Proxy create(array|callable $attributes = [])
 * @method static Professional|Proxy createOne(array $attributes = [])
 * @method static Professional|Proxy find(object|array|mixed $criteria)
 * @method static Professional|Proxy findOrCreate(array $attributes)
 * @method static Professional|Proxy first(string $sortedField = 'id')
 * @method static Professional|Proxy last(string $sortedField = 'id')
 * @method static Professional|Proxy random(array $attributes = [])
 * @method static Professional|Proxy randomOrCreate(array $attributes = [])
 * @method static ProfessionalRepository|RepositoryProxy repository()
 * @method static Professional[]|Proxy[] all()
 * @method static Professional[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Professional[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Professional[]|Proxy[] findBy(array $attributes)
 * @method static Professional[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Professional[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class ProfessionalFactory extends ModelFactory
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
            'description' => self::faker()->boolean()
                ? self::faker()->unique()->company()
                : self::faker()->unique()->firstName() . ' ' . self::faker()->lastName() . ' ' . self::faker()->lastName()
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Professional $professional): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Professional::class;
    }
}
