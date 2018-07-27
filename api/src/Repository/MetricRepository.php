<?php


namespace App\Repository;


use App\Entity\Metric;

class MetricRepository
{

    public function __construct()
    {
        $mongoDbUrl = getenv('MONGO_URL') ?: "mongodb://localhost:27017";
        $client = new \MongoDB\Client($mongoDbUrl);
        $this->collection = $client->numbers->metrics;
    }

    public function add(Metric $metric)
    {
        $document = $this->metricToDocument($metric);
        $this->collection->insertOne($document);
    }

    public function findAll()
    {
        $documents = $this->collection->find()->toArray();
        return array_map([$this, 'documentToMetric'], $documents);
    }

    private function metricToDocument(Metric $metric): array
    {
        return $metric->jsonSerialize();
    }

    private function documentToMetric($document): Metric
    {
        return new Metric($document['name'], $document['url'], $document['selector']);
    }
}