<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class MetricsApiTest extends WebTestCase
{

    public function setUp(): void
    {
        $mongoDbUrl = getenv('MONGO_URL') ?: "mongodb://localhost:27017";
        $client = new \MongoDB\Client($mongoDbUrl);
        $this->collection = $client->numbers->metrics;
        $this->collection->drop();
    }

    public function testAMetricAddedCanBeFoundInTheMetricList(): void
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

    public function testAMetricShouldHaveAName(): void
    {
        $this->assertBadRequestWithMessage(['name' => '', 'url' => 'http://example.com', 'selector' => '#my_id'], "Name is required");
    }

    public function testAMetricShouldHaveAUrl(): void
    {
        $this->assertBadRequestWithMessage(['name' => 'my number', 'url' => '', 'selector' => '#my_id'], "Url is required");
    }

    public function testAMetricShouldHaveAValidUrl(): void
    {
        $this->assertBadRequestWithMessage(['name' => 'my number', 'url' => 'ht:/some strange string', 'selector' => '#my_id'], "Url is invalid");
    }

    public function testAMetricShouldHaveASelector(): void
    {
        $this->assertBadRequestWithMessage(['name' => 'my name', 'url' => 'http://example.com', 'selector' => ''], "Selector is required");
    }

    protected function assertBadRequestWithMessage($request, $errorMessage): void
    {
        //$this->expectException(BadRequestHttpException::class);
        //$this->expectExceptionMessage($errorMessage);

        $client = self::createClient();
        $client->request('POST', '/metrics', $request);

        $this->assertTrue($client->getResponse()->isClientError());
        $response = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals($errorMessage, $response['message']);
    }

}