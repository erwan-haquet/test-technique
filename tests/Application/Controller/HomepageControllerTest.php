<?php

namespace App\Tests\Application\Controller;

use App\Factory\SpecialistFactory;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class HomepageControllerTest extends WebTestCase
{
    use ResetDatabase, Factories;

    private const URL = '/';

    public function testHomepageIsUp(): void
    {
        // Arrange
        $client = static::createClient();

        // Act
        $client->request('GET', self::URL);

        // Assert
        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('Welcome !');
    }

    public function testAllActiveSpecialistsAreDisplayed(): void
    {
        // Arrange
        $client = static::createClient();
        SpecialistFactory::createMany(8, ['active' => true]);
        SpecialistFactory::createMany(3, ['active' => false]);

        // Act
        $crawler = $client->request('GET', self::URL);

        // Assert
        $this->assertCount(8, $crawler->filter('.member-card'));
    }

    public function testOnlineSpecialistsAreDisplayedFirst(): void
    {
        // Arrange
        $client = static::createClient();
        SpecialistFactory::createMany(13, ['active' => true, 'online' => false]);
        SpecialistFactory::createMany(10, ['active' => true, 'online' => true]);
        SpecialistFactory::createMany(2, ['active' => true, 'online' => false]);

        // Act
        $crawler = $client->request('GET', self::URL);

        // Assert
        // Extract the 10 firsts nodes from #member-list
        $firstMembers = $crawler->filter('#member-list')->children()->slice(length: 10);
        foreach ($firstMembers as $member) {
            $this->assertStringContainsString("En ligne", $member->textContent);
        }

        // Extract every node from #member-list starting from the 10th
        $latestMembers = $crawler->filter('#member-list')->children()->slice(offset: 10);
        foreach ($latestMembers as $member) {
            $this->assertStringContainsString("Hors ligne", $member->textContent);
        }
    }

    public function testSpecialistSummaryIsAvailableOnFirstNameClick(): void
    {
        // Arrange
        $client = static::createClient();
        $specialist = SpecialistFactory::createOne([
            'active' => true,
            'firstName' => 'John'
        ]);

        // Act
        $crawler = $client->request('GET', self::URL);

        // Assert
        $link = $crawler->selectLink('John')->link()->getUri();
        $expectedLink = sprintf("/psychologue/%s", $specialist->getId());
        $this->assertStringContainsString($expectedLink, $link);
    }
}
