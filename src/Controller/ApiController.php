<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController
{
    #[Route("/api/quote", name: "quote")]
    public function jsonQuotes(): Response
    {
        $quotes = [
            "Be yourself; everyone else is already taken.",
            "Two things are infinite: the universe and human stupidity; and I'm not sure about the universe.",
            "You know you're in love when you can't fall asleep because reality is finally better than your dreams."
        ];

        $today_quote = array_rand($quotes);

        $data = [
            'Todays quote' => $quotes[$today_quote],
            'Date' => date("Y/m/d"),
            'Time' => date("H:i:sa")
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
        return $response;
    }
}
