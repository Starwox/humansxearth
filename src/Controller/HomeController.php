<?php
/**
 * Created by PhpStorm.
 * User: starwox
 * Date: 12/06/2020
 * Time: 13:57
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{


     /**
      * @Route("/home")
      */
    public function number(): JsonResponse
    {
        // Exemple for Json Response
        $json = file_get_contents("/Users/starwox/Desktop/humans_planets/src/JsonFile/example.json");
        $data = json_decode($json, true);

        return new JsonResponse($data);
    }

}