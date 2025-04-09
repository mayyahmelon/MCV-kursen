<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

date_default_timezone_set("Europe/Stockholm");

class ApiController
{
    #[Route("/api/quote", name: "quote")]
    public function jsonQuotes(): Response
    {
        $quotes = [
            "Making a journey by night is more wonderful than anything in the world. - Moominpappa",
            "All things are so very uncertain. And that’s exactly what makes me feel reassured. - Too-Ticky",
            "Hope for the best and prepare for the worst. - Little My",
            "I knew nothing, but I believed a lot. - Moominpappa",
            "When one’s dead, one’s dead… This squirrel will become earth all in his time. And still later on, there’ll grow new trees from him, with new squirrels skipping about in them. Do you think that’s so very sad? - Too-Ticky"
        ];

        $today_quote = array_rand($quotes);

        $data = [
            'Todays quote' => $quotes[$today_quote],
            'Date' => date("Y/m/d"),
            'Time' => date("H:i:s")
        ];

        $response = new JsonResponse($data);
        $response->setEncodingOptions(
            $response->getEncodingOptions() | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        );
        return $response;
    }
}
