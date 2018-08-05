<?php


namespace App\UseCase;

use App\Entity\InvalidEntityException;
use App\Entity\Metric;
use App\Repository\MetricRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AddMetricUseCase
{
    private $metricRepository;

    public function __construct(MetricRepository $metricRepository)
    {
        $this->metricRepository = $metricRepository;
    }

    public function add($name, $url, $selector): Metric
    {
        try {
            $metric = new Metric($name, $url, $selector);
        } catch (InvalidEntityException $exception) {
            throw new BadRequestHttpException($exception->getMessage());
        }
        $this->metricRepository->add($metric);
        return $metric;
    }
}