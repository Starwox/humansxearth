<?php
/**
 * Created by PhpStorm.
 * User: starwox
 * Date: 12/06/2020
 * Time: 13:57
 */

namespace App\Controller;


use App\Entity\News;
use App\Entity\Tag;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class HomeController extends AbstractController
{


     /**
      * @Route("/home")
      */
    public function number(): JsonResponse
    {
        // Exemple for Json Response
        $json = file_get_contents("/Users/starwox/Desktop/humans_planets/src/JsonFile/example.json");
        $data = json_decode($json, true);
        echo uniqid();

        return new JsonResponse($data);
    }

    /**
     * @Route("/user")
     */
    public function user(UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User();
        $user->setEmail('admin@gmail.com');
        $encoded = hash('sha256', "admin");

        $user->setPassword($encoded);

        $dt = new \DateTime('now');
        $dt->add(new \DateInterval('PT2H'));
        $user->setCreatedAt($dt);

        $repository = $this->getDoctrine()->getRepository(Tag::class);
        $tag = $repository->findAll();
        foreach ($tag as $value) {
            $user->addTag($value);
        }
        $user->setGender('male');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();


        return new Response(
            'Saved new user with id: '.$user->getId());
    }

    /**
     * @Route("/tag")
     */
    public function tag(): Response
    {
        $tag = new Tag();
        $tag->setName('Racism');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($tag);
        $entityManager->flush();


        return new Response(
            'Saved new tag with id: '.$tag->getId());
    }

    /**
     * @Route("/news")
     */
    public function news(): Response
    {
        $news = new News();
        $news->setName('Ecologist');
        $news->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis purus a justo lacinia viverra nec sit amet risus. Integer aliquam ex sit amet velit eleifend varius. Vestibulum a dictum nunc, at blandit sem. Maecenas sit amet nulla ultrices, molestie felis in, porttitor turpis. Nullam viverra eros in risus tristique aliquet. Cras ipsum nisi, feugiat et commodo non, efficitur id diam. Vivamus placerat ante sit amet velit tempus, sit amet lobortis lacus fringilla. Proin mattis ornare augue, eget facilisis neque fermentum ac. Sed consequat nec orci ut condimentum. Ut sed elit ut mi suscipit placerat a sed justo.

Duis sagittis lacinia arcu, sit amet mattis nulla placerat nec. Sed tincidunt nibh non ex auctor ultrices. Donec eleifend, urna auctor tempus congue, ante nisi hendrerit leo, nec pellentesque justo nibh in ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ipsum arcu, tempus at nisi vehicula, tincidunt accumsan turpis. Nunc tincidunt enim id nisi pretium, elementum pharetra mi rhoncus. Phasellus pharetra pretium dui id sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse potenti. Sed ut odio mollis, hendrerit urna eget, gravida purus. Phasellus pulvinar erat enim, vitae egestas dui tincidunt at. Sed id molestie metus. Ut eget orci blandit, egestas enim at, fermentum nibh.

Curabitur aliquam, leo non ultricies feugiat, ligula diam accumsan ipsum, in sagittis quam purus in ligula. Morbi at dictum turpis, id iaculis turpis. Aenean quis felis ornare purus eleifend suscipit. Vivamus iaculis, ligula quis fringilla suscipit, nibh lacus sodales velit, nec sollicitudin justo turpis sit amet ipsum. Nullam id iaculis nibh. Etiam dignissim, est non semper condimentum, augue turpis malesuada urna, vel finibus odio est a purus. Morbi sagittis vehicula augue.

Donec at rhoncus tellus. Ut ultricies faucibus metus, vel egestas nunc scelerisque nec. Donec sem arcu, fermentum sit amet efficitur vitae, sagittis in nisl. Etiam efficitur lacus eleifend massa lacinia, et euismod lectus ultrices. Suspendisse est risus, ultrices sed imperdiet iaculis, mattis eget erat. Suspendisse egestas, odio vel aliquet porta, nibh orci lobortis ipsum, non blandit neque neque quis quam. Aliquam lobortis imperdiet ligula a sodales.

Donec erat odio, tempus quis pulvinar sed, faucibus a velit. Quisque ultricies aliquam elit, quis dignissim sapien tristique in. Morbi nec tincidunt orci. Aliquam eleifend mi quis ex tincidunt, sed congue lacus gravida. Ut a fringilla sem, convallis auctor ligula. Vivamus ultrices nisl vel massa suscipit, eget auctor ex venenatis. Praesent ac felis eleifend neque ornare pellentesque eu vel elit. Pellentesque aliquet augue nisi, ut fringilla purus lobortis ut. Nulla iaculis purus at libero auctor, ut scelerisque libero ultrices. Cras neque nisi, ultricies tincidunt vulputate quis, lobortis nec leo. Phasellus ut auctor sapien. Aliquam at nulla lacus. Sed efficitur finibus nisi, nec pretium velit pharetra eu. Quisque quis condimentum ipsum, at aliquet diam. Donec commodo lobortis massa, id ullamcorper ligula interdum sed.

');
        $dt = new \DateTime('now');
        $dt->add(new \DateInterval('PT2H'));
        $news->setCreatedAt($dt);

        $repository = $this->getDoctrine()->getRepository(Tag::class);
        $tag = $repository->find(2);
        $news->setTags($tag);


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($news);
        $entityManager->flush();


        return new Response(
            'Saved new news with id: '.$news->getId());
    }
}