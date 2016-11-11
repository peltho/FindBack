<?php

namespace FindBack\SiteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/Thomas');

        $this->assertTrue($crawler->filter('html:contains("Hello Thomas")')->count() > 0);
    }
}
