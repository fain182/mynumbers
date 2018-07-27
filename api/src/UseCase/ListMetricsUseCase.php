<?php

namespace App\UseCase;

use App\Repository\MetricRepository;

class ListMetricsUseCase
{
    private $metricRepository;

    public function __construct(MetricRepository $metricRepository)
    {
        $this->metricRepository = $metricRepository;
    }

    public function listAll(): Array
    {
        return $this->metricRepository->findAll();
    }

}