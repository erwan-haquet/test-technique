<?php

namespace App\Factory;

use App\Entity\Specialist;
use App\Repository\Doctrine\SpecialistRepository;
use JetBrains\PhpStorm\ArrayShape;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Specialist>
 *
 * @method static Specialist|Proxy createOne(array $attributes = [])
 * @method static Specialist[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Specialist|Proxy find(object|array|mixed $criteria)
 * @method static Specialist|Proxy findOrCreate(array $attributes)
 * @method static Specialist|Proxy first(string $sortedField = 'id')
 * @method static Specialist|Proxy last(string $sortedField = 'id')
 * @method static Specialist|Proxy random(array $attributes = [])
 * @method static Specialist|Proxy randomOrCreate(array $attributes = [])
 * @method static Specialist[]|Proxy[] all()
 * @method static Specialist[]|Proxy[] findBy(array $attributes)
 * @method static Specialist[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Specialist[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static SpecialistRepository|RepositoryProxy repository()
 * @method Specialist|Proxy create(array|callable $attributes = [])
 */
final class SpecialistFactory extends ModelFactory
{
    #[ArrayShape(['firstName' => "string", 'lastName' => "string", 'online' => "bool", 'active' => "bool", 'description' => "string", 'mobile' => "string", 'email' => "string", 'city' => "string"])] 
    protected function getDefaults(): array
    {
        return [
            'firstName' => self::faker()->firstName(),
            'lastName' => self::faker()->lastName(),
            'online' => self::faker()->boolean(),
            'active' => self::faker()->boolean(),
            'description' => self::faker()->text(),
            'mobile' => '06' . self::faker()->numberBetween(10000000, 99999999),
            'email' => self::faker()->email(),
            'city' => self::faker()->city(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this// ->afterInstantiate(function(Specialist $specialist): void {})
            ;
    }

    protected static function getClass(): string
    {
        return Specialist::class;
    }
}
