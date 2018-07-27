<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class MetricsApiTest extends WebTestCase
{

    public function setUp(): void
    {
        $mongoDbUrl = getenv('MONGO_URL') ?: "mongodb://localhost:27017";
        $client = new \MongoDB\Client($mongoDbUrl);
        $this->collection = $client->numbers->metrics;
        $this->collection->drop();
    }

    public function testAddMetrics(): void
    {
        $client = self::createClient();
        $metric = ['name' => 'numero', 'url' => 'http://example.com', 'selector' => '#my_id'];
        $client->request('POST', '/metrics', $metric);

        $this->assertTrue($client->getResponse()->isSuccessful());

        $client = self::createClient();
        $client->request('GET', '/metrics');

        $metrics = json_decode($client->getResponse()->getContent(), true);
        $this->assertCount(1, $metrics);
        $this->assertArraySubset($metric, $metrics[0]);
    }

}