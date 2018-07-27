<?php


namespace App\UseCase;


use App\Entity\Metric;
use App\Repository\MetricRepository;

class AddMetricUseCase
{
    private $metricRepository;

    public function __construct(MetricRepository $metricRepository)
    {
        $this->metricRepository = $metricRepository;
    }

    public function add($name, $url, $selector): Metric
    {
        $metric = new Metric($name, $url, $selector);
        $this->metricRepository->add($metric);
        return $metric;
    }
}