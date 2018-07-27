<?php

namespace App\Controller;

use App\UseCase\AddMetricUseCase;
use App\UseCase\ListMetricsUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MetricsController extends Controller
{
    /**
     * @Route("/metrics", name="metric_list", methods={"GET"})
     */
    public function list(ListMetricsUseCase $useCase): JsonResponse
    {
        return $this->json($useCase->listAll());
    }

    /**
     * @Route("/metrics", name="metric_add", methods={"POST"})
     */
    public function create(Request $request, AddMetricUseCase $useCase): JsonResponse
    {
        $post = $request->request;
        $metric = $useCase->add($post->get('name'), $post->get('url'), $post->get('selector'));
        return $this->json($metric);
    }

}
