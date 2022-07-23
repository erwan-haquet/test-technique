<?php

namespace App\Tests\Application\Controller\Specialist;

use App\Factory\SpecialistFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class SummaryControllerTest extends WebTestCase
{
    use ResetDatabase, Factories;

    public function testActiveSpecialistSummaryIsAvailable(): void
    {
        // Arrange
        $client = static::createClient();
        $specialist = SpecialistFactory::createOne(['active' => true]);

        // Act
        $client->request('GET', sprintf("/psychologue/%s", $specialist->getId()));

        // Assert
        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains($specialist->getName());
    }

    public function testInactiveSpecialistSummaryIsNotAvailable(): void
    {
        // Arrange
        $client = static::createClient();
        $specialist = SpecialistFactory::createOne(['active' => false]);

        // Act
        $client->request('GET', sprintf("/psychologue/%s", $specialist->getId()));

        // Assert
        $this->assertResponseStatusCodeSame(404);
    }

    public function testSummaryContainsSpecialistDescription(): void
    {
        // Arrange
        $client = static::createClient();
        $specialist = SpecialistFactory::createOne(['active' => true]);

        // Act
        $client->request('GET', sprintf("/psychologue/%s", $specialist->getId()));

        // Assert
        $this->assertSelectorTextContains('.member-summary', $specialist->getDescription());
    }
}
