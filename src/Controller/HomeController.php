<?php
/**
 * Created by PhpStorm.
 * User: starwox
 * Date: 12/06/2020
 * Time: 13:57
 */

namespace App\Controller;


use App\Entity\Challenge;
use App\Entity\News;
use App\Entity\Step;
use App\Entity\Tag;
use App\Entity\Tips;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{
     /**
      * @Route("/")
      */
    public function home(): Response
    {
        return new Response("Hello World");
    }
}