<?php

namespace App\Factory;

use App\Entity\Member;
use App\Repository\MemberRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Member>
 *
 * @method        Member|Proxy create(array|callable $attributes = [])
 * @method static Member|Proxy createOne(array $attributes = [])
 * @method static Member|Proxy find(object|array|mixed $criteria)
 * @method static Member|Proxy findOrCreate(array $attributes)
 * @method static Member|Proxy first(string $sortedField = 'id')
 * @method static Member|Proxy last(string $sortedField = 'id')
 * @method static Member|Proxy random(array $attributes = [])
 * @method static Member|Proxy randomOrCreate(array $attributes = [])
 * @method static MemberRepository|RepositoryProxy repository()
 * @method static Member[]|Proxy[] all()
 * @method static Member[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Member[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Member[]|Proxy[] findBy(array $attributes)
 * @method static Member[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Member[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class MemberFactory extends ModelFactory
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
            'firstName' => self::faker()->firstName(),
            'lastName' => self::faker()->lastName() . ' ' . self::faker()->lastName(),
            'address' => self::faker()->address(),
            'city' => self::faker()->city(),
            'zipCode' => self::faker()->numerify('#####'),
            'iban' => self::faker()->iban(),
            'membershipCardNumber' => self::faker()->numerify('S-#####'),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Member $member): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Member::class;
    }
}
