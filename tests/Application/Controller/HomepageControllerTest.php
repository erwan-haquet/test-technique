<?php

namespace App\Tests\Application\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageControllerTest extends WebTestCase
{
    private const URL = '/';
    
    public function testSomething(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', self::URL);

        $this->assertResponseIsSuccessful();
        $this->assertPageTitleContains('Welcome !');
    }
}
