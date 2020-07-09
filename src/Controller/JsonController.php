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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;



class JsonController extends AbstractController
{

    /**
     * @Route("/json/register", methods={"POST","HEAD"})
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

        $user->setEmail($email);
        $encoded = password_hash( $password, PASSWORD_DEFAULT);
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
     * @Route("/json/login", methods={"POST","HEAD"})
     */
    public function login(Request $request): JsonResponse
    {
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        $repo = $this->getDoctrine()->getRepository(User::class);
        $checker = $repo->findBy(['email' => $email]);

        $encoded = password_verify($password, $checker[0]->getPassword());


        if (empty($checker) OR !$encoded) {
            return new JsonResponse(["success" => "no"]);
        }

        return new JsonResponse([
            'success' => 'yes',
            'id' => $checker[0]->getId(),
            'email' => $checker[0]->getEmail(),
            'password' => $password,
            'name' => $checker[0]->getName(),
            'created_at' => $checker[0]->getCreatedAt()
        ]);

    }

    /**
     * @Route("/json/challenge", methods={"GET","HEAD"})
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
     * @Route("/json/news", methods={"GET","HEAD"})
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


    /**
     * @Route("/json/challenge/setter", methods={"POST","HEAD"})
     */
    public function validStep(Request $request): JsonResponse
    {
        $em = $this->getDoctrine()->getManager();
        $user_id = $request->request->get('user_id');
        $step_id = $request->request->get('step_id');

        $doctrine = $this->getDoctrine();

        $user = $doctrine->getRepository(User::class)->find($user_id);
        $step = $doctrine->getRepository(Step::class)->find($step_id);



        if (empty($user) OR empty($step)) {
            return new JsonResponse([
                "success" => "no",
                "reason" => "User or Step doesn't match"
            ]);
        }

        $stepValid = [];

        foreach ($user->getStep() as $value) {
            array_push($stepValid, $value->getId());
            if (in_array($stepValid, $value->getId(), true)) {
                return new JsonResponse([
                    "success" => "no",
                    "reason" => "Already Exist"

                ]);
            }
        }


        $user->addStep($step);

        $em->persist($user);
        $em->flush();

        return new JsonResponse([
            "success" => "yes"
        ]);
    }

    /**
     * @Route("/json/challenge/getter", methods={"POST","HEAD"})
     */
    public function getUserStep(Request $request): Response
    {

        $id = $request->request->get('user_id');

        $repo = $this->getDoctrine()->getRepository(User::class);
        $object = $repo->find($id);

        $steprepo = $this->getDoctrine()->getRepository(Step::class);


        $count = count($steprepo->findAll());

        if (empty($object)) {
            return new JsonResponse([
                "success" => "no",
                "reason" => "User doesn't match"
            ]);
        }


        $encoders = new JsonEncoder();



        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object;
            },
        ];

        $normalizer = new ObjectNormalizer(null, null, null, null, null, null, $defaultContext);

        $serializer = new Serializer([$normalizer], [$encoders]);

        $data = $serializer->serialize([$object, $count], 'json', [AbstractNormalizer::ATTRIBUTES => [
            'id',
            'email',
            'step' => [
                'id',
                'name'
            ]
        ]]);

        return new Response($data);

    }

    /**
     * @Route("/json/stepandtag", methods={"GET","HEAD"})
     */
    public function stepandtag(): Response
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


}