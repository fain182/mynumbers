<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HeartBeatController extends Controller
{
    /**
     * @Route("/", name="heart_beat")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Everything is up and running!'
        ]);
    }
}
