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
        $tag->setName('Numérique');

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
        $news->setName('Pollution');
        $news->setContent('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis purus a justo lacinia viverra nec sit amet risus. Integer aliquam ex sit amet velit eleifend varius. Vestibulum a dictum nunc, at blandit sem. Maecenas sit amet nulla ultrices, molestie felis in, porttitor turpis. Nullam viverra eros in risus tristique aliquet. Cras ipsum nisi, feugiat et commodo non, efficitur id diam. Vivamus placerat ante sit amet velit tempus, sit amet lobortis lacus fringilla. Proin mattis ornare augue, eget facilisis neque fermentum ac. Sed consequat nec orci ut condimentum. Ut sed elit ut mi suscipit placerat a sed justo.
            Duis sagittis lacinia arcu, sit amet mattis nulla placerat nec. Sed tincidunt nibh non ex auctor ultrices. Donec eleifend, urna auctor tempus congue, ante nisi hendrerit leo, nec pellentesque justo nibh in ligula. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce ipsum arcu, tempus at nisi vehicula, tincidunt accumsan turpis. Nunc tincidunt enim id nisi pretium, elementum pharetra mi rhoncus. Phasellus pharetra pretium dui id sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse potenti. Sed ut odio mollis, hendrerit urna eget, gravida purus. Phasellus pulvinar erat enim, vitae egestas dui tincidunt at. Sed id molestie metus. Ut eget orci blandit, egestas enim at, fermentum nibh.
            Curabitur aliquam, leo non ultricies feugiat, ligula diam accumsan ipsum, in sagittis quam purus in ligula. Morbi at dictum turpis, id iaculis turpis. Aenean quis felis ornare purus eleifend suscipit. Vivamus iaculis, ligula quis fringilla suscipit, nibh lacus sodales velit, nec sollicitudin justo turpis sit amet ipsum. Nullam id iaculis nibh. Etiam dignissim, est non semper condimentum, augue turpis malesuada urna, vel finibus odio est a purus. Morbi sagittis vehicula augue.
            Donec at rhoncus tellus. Ut ultricies faucibus metus, vel egestas nunc scelerisque nec. Donec sem arcu, fermentum sit amet efficitur vitae, sagittis in nisl. Etiam efficitur lacus eleifend massa lacinia, et euismod lectus ultrices. Suspendisse est risus, ultrices sed imperdiet iaculis, mattis eget erat. Suspendisse egestas, odio vel aliquet porta, nibh orci lobortis ipsum, non blandit neque neque quis quam. Aliquam lobortis imperdiet ligula a sodales.
            Donec erat odio, tempus quis pulvinar sed, faucibus a velit. Quisque ultricies aliquam elit, quis dignissim sapien tristique in. Morbi nec tincidunt orci. Aliquam eleifend mi quis ex tincidunt, sed congue lacus gravida. Ut a fringilla sem, convallis auctor ligula. Vivamus ultrices nisl vel massa suscipit, eget auctor ex venenatis. Praesent ac felis eleifend neque ornare pellentesque eu vel elit. Pellentesque aliquet augue nisi, ut fringilla purus lobortis ut. Nulla iaculis purus at libero auctor, ut scelerisque libero ultrices. Cras neque nisi, ultricies tincidunt vulputate quis, lobortis nec leo. Phasellus ut auctor sapien. Aliquam at nulla lacus. Sed efficitur finibus nisi, nec pretium velit pharetra eu. Quisque quis condimentum ipsum, at aliquet diam. Donec commodo lobortis massa, id ullamcorper ligula interdum sed.    
        ');


        $repository = $this->getDoctrine()->getRepository(Tag::class);
        $tag = $repository->find(2);
        $news->setTags($tag);
        $news->setLink("https://www.lesechos.fr/2016/04/le-top-10-des-dechets-collectes-sur-les-plages-205477");
        $news->setAuthor('Test');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($news);
        $entityManager->flush();


        return new Response(
            'Saved new news with id: '.$news->getId());
    }

    /**
     * @Route("/step")
     */
    public function step(): Response
    {
        $step = new Step();
        $step->setName('La pollution');

        $step2 = new Step();
        $step2->setName("Au travail");

        $step3 = new Step();
        $step3->setName("Le streaming");

        $step4 = new Step();
        $step4->setName('Les données');

        $step5 = new Step();
        $step5->setName("L'obsolescence");

        $step6 = new Step();
        $step6->setName('Le téléphone');

        $repository = $this->getDoctrine()->getRepository(Tag::class);
        $tag = $repository->find(5);
        $step->setTag($tag);
        $step2->setTag($tag);
        $step3->setTag($tag);
        $step4->setTag($tag);
        $step5->setTag($tag);
        $step6->setTag($tag);


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($step);
        $entityManager->persist($step2);
        $entityManager->persist($step3);
        $entityManager->persist($step4);
        $entityManager->persist($step5);
        $entityManager->persist($step6);
        $entityManager->flush();


        return new Response(
            'Saved new news with id: '.$step->getId() .
            'Saved new news with id: '.$step2->getId() .
            'Saved new news with id: '.$step3->getId() .
            'Saved new news with id: '.$step4->getId() .
            'Saved new news with id: '.$step5->getId()
        );
    }

    /**
     * @Route("/tips")
     */
    public function tips(): Response
    {
        $tips = new Tips();
        $tips->setContent("Mets un autocollant Stop-Pub sur ta boîte aux lettres");

        $tips2 = new Tips();
        $tips2->setContent("Mets un autocollant Stop-Pub sur ta boîte aux lettres");

        $tips3 = new Tips();
        $tips3->setContent("Mets un autocollant Stop-Pub sur ta boîte aux lettres");

        $repository = $this->getDoctrine()->getRepository(Step::class);
        $step = $repository->find(2);
        $tips->setStep($step);
        $tips2->setStep($step);
        $tips3->setStep($step);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($tips);
        $entityManager->persist($tips2);
        $entityManager->persist($tips3);
        $entityManager->flush();


        return new Response(
            'Saved new news with id: '.$tips->getId() .
            'Saved new news with id: '.$tips2->getId() .
            'Saved new news with id: '.$tips3->getId()
        );
    }

    /**
     * @Route("/challenge")
     */
    public function challenge(): Response
    {

        $step = $this->getDoctrine()->getRepository(Step::class)->find(1);
        $tips = $this->getDoctrine()->getRepository(Tips::class)->find(1);
        $tips2 = $this->getDoctrine()->getRepository(Tips::class)->find(2);
        $tips3 = $this->getDoctrine()->getRepository(Tips::class)->find(3);

        $news = $this->getDoctrine()->getRepository(News::class)->find(1);
        $news2 = $this->getDoctrine()->getRepository(News::class)->find(2);

        $chall = new Challenge();

        $chall->setContent("Aujourd'hui limite le papier !");
        $chall->setToKnow('35 kilos de déchets par an sont évités en mettant l’autocollant Stop-Pub.');
        $chall->setStep($step);
        $chall->addTip($tips);
        $chall->addTip($tips2);
        $chall->addTip($tips3);
        $chall->addNews($news);
        $chall->addNews($news2);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($chall);
        $entityManager->flush();

        return new Response('Saved new challenge with id: '.$chall->getId());
    }
}