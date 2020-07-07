<?php
/**
 * Created by PhpStorm.
 * User: starwox
 * Date: 06/07/2020
 * Time: 09:34
 */

namespace App\Controller;


use App\Entity\Challenge;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\News;
use App\Entity\Step;
use App\Entity\Tag;
use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Constraints\Json;


class JsonController extends AbstractController
{

    /**
     * @Route("/json/step")
     */
    public function step(): Response
    {

        $encoders = new JsonEncoder();

        $repository = $this->getDoctrine()->getRepository(Step::class);
        $object = $repository->findAll();

        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object;
            },
        ];

        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoders]);
        $data = $serializer->serialize($object, 'json', [AbstractNormalizer::ATTRIBUTES => [
            'id',
            'name',
            'tag' => [
                'id',
                'name'
            ]
        ]]);


        return new Response($data);
    }

    /**
     * @Route("/json/register")
     */
    public function register(Request $request): JsonResponse
    {

        $em = $this->getDoctrine()->getManager();
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $name = $request->request->get('name');

        $repo = $this->getDoctrine()->getRepository(User::class);
        $checker = $repo->findBy(['email' => $email]);

        if (!empty($checker)) {
           return new JsonResponse(['success' => 'no']);
        }

        $user = new User();
        dump("HelloWorld");die();

        $user->setEmail($email);
        $encoded = $encoded = hash('sha256', $password);
        $user->setPassword($encoded);

        $user->setName($name);

        $dt = new \DateTime('now');
        $dt->add(new \DateInterval('PT2H'));
        $user->setCreatedAt($dt);

        $em->persist($user);
        $em->flush();

       return new JsonResponse([
           'success' => 'yes',
           'id' => $user->getId(),
           'email' => $user->getEmail(),
           'password' => $password,
           'name' => $user->getName(),
           'created_at' => $user->getCreatedAt()

       ]);

    }

    /**
     * @Route("/json/login")
     */
    public function login(Request $request): JsonResponse
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');
        $encoded = $encoded = hash('sha256', $password);


        $repo = $this->getDoctrine()->getRepository(User::class);
        $checker = $repo->findBy([
            'email' => $email,
            'password' => $encoded
            ]);

        if (empty($checker)) {
            return new JsonResponse(["success" => "no"]);
        }

        return new JsonResponse([
            'success' => 'yes',
            'id' => $checker->getId(),
            'email' => $checker->getEmail(),
            'password' => $password,
            'name' => $checker->getName(),
            'created_at' => $checker->getCreatedAt()
        ]);

    }

    /**
     * @Route("/json/challenge")
     */
    public function challenge(Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(Challenge::class);
        $object = $repository->findAll();

        $encoders = new JsonEncoder();
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object;
            },
        ];

        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);
        $serializer = new Serializer([$normalizer], [$encoders]);
        $data = $serializer->serialize($object, 'json', [AbstractNormalizer::ATTRIBUTES => [
            'id',
            'content',
            'toKnow',
            'step' => [
                'id',
                'name'
            ],
            'tips' => [
                'id',
                'content'
            ],
            'news' => [
                'id',
                'name',
                'content',
                'link',
                'author'
            ]
        ]]);

        return new Response($data);
    }


    /**
     * @Route("/json/news")
     */
    public function news(): Response
    {

        $encoders = new JsonEncoder();

        $repository = $this->getDoctrine()->getRepository(News::class);
        $object = $repository->findAll();

        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object;
            },
        ];

        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoders]);
        $data = $serializer->serialize($object, 'json', [AbstractNormalizer::ATTRIBUTES => [
            'id',
            'name',
            'tags' => [
                'id',
                'name'
            ],
            'content',
            'link',
            'author'
        ]]);


        return new Response($data);
    }


}