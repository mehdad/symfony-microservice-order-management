<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WarehouseController extends AbstractController
{
    public function __construct(
        private HttpClientInterface $client,
    ) {
    }

    #[Route('/warehouse', name: 'app_warehouse')]
    public function index(): JsonResponse
    {
        $response = $this->client->request(
            'GET',
            'http://service_symfony/warehouse'
        );

        $content = $response->getContent();

        return $this->json(json_decode($content));
    }
}
