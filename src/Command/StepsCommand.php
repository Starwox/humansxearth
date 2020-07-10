<?php
/**
 * Created by PhpStorm.
 * User: starwox
 * Date: 10/07/2020
 * Time: 16:03
 */

namespace App\Command;

use App\Entity\News;
use App\Entity\Step;
use App\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StepsCommand extends Command
{
    /**
     * StatusCommand constructor.
     * @var EntityManagerInterface $em
     */
    private $em;

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'steps:insert-data';

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription("Insert Steps Data on database");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $repository = $this->em->getRepository(Tag::class);

        // Déchets
        $tagDechets = $repository->find(1);

        $step = new Step();
        $step->setName("La plage");
        $step->setTag($tagDechets);

        $step2 = new Step();
        $step2->setName("Les emballages");
        $step2->setTag($tagDechets);

        $step3 = new Step();
        $step3->setName("Le ramassage");
        $step3->setTag($tagDechets);

        $step4 = new Step();
        $step4->setName("Le recyclage");
        $step4->setTag($tagDechets);

        $step5 = new Step();
        $step5->setName("Se limiter");
        $step5->setTag($tagDechets);

        $step6 = new Step();
        $step6->setName("Les cottons tiges");
        $step6->setTag($tagDechets);


        // Style de Vie

        $tagSDV = $repository->find(11);

        $step7 = new Step();
        $step7->setName("Se déplacer");
        $step7->setTag($tagSDV);

        $step8 = new Step();
        $step8->setName("S'habiller");
        $step8->setTag($tagSDV);

        $step9 = new Step();
        $step9->setName("La créativité");
        $step9->setTag($tagSDV);

        $step10 = new Step();
        $step10->setName("La soif");
        $step10->setTag($tagSDV);

        $step11 = new Step();
        $step11->setName("Le sport");
        $step11->setTag($tagSDV);

        $step12 = new Step();
        $step12->setName("La fête");
        $step12->setTag($tagSDV);


        // A la maison

        $tagHome = $repository->find(21);

        $step13 = new Step();
        $step13->setName("La viande");
        $step13->setTag($tagHome);

        $step14 = new Step();
        $step14->setName("Les saisons");
        $step14->setTag($tagHome);

        $step15 = new Step();
        $step15->setName("Acheter local");
        $step15->setTag($tagHome);

        $step16 = new Step();
        $step16->setName("Le nettoyage");
        $step16->setTag($tagHome);

        $step17 = new Step();
        $step17->setName("L'hygiène");
        $step17->setTag($tagHome);

        $step18 = new Step();
        $step18->setName("La cuisine");
        $step18->setTag($tagHome);

        // Consommation

        $tagConso = $repository->find(31);

        $step19 = new Step();
        $step19->setName("Le chauffage");
        $step19->setTag($tagConso);

        $step20 = new Step();
        $step20->setName("La nourriture");
        $step20->setTag($tagConso);

        $step21 = new Step();
        $step21->setName("L'électricité");
        $step21->setTag($tagConso);

        $step22 = new Step();
        $step22->setName("Se laver");
        $step22->setTag($tagConso);

        $step23 = new Step();
        $step23->setName("L'eau");
        $step23->setTag($tagConso);

        $step24 = new Step();
        $step24->setName("Le composteur");
        $step24->setTag($tagConso);

        // Numérique

        $tagNum = $repository->find(41);

        $step25 = new Step();
        $step25->setName("La pollution");
        $step25->setTag($tagNum);

        $step26 = new Step();
        $step26->setName("Au travail");
        $step26->setTag($tagNum);

        $step27 = new Step();
        $step27->setName("Le streaming");
        $step27->setTag($tagNum);

        $step28 = new Step();
        $step28->setName("Les données");
        $step28->setTag($tagNum);

        $step29 = new Step();
        $step29->setName("L'obsolescence");
        $step29->setTag($tagNum);

        $step30 = new Step();
        $step30->setName("Le téléphone");
        $step30->setTag($tagNum);



        $this->em->persist($step);
        $this->em->persist($step2);
        $this->em->persist($step3);
        $this->em->persist($step4);
        $this->em->persist($step5);
        $this->em->persist($step6);
        $this->em->persist($step7);
        $this->em->persist($step8);
        $this->em->persist($step9);
        $this->em->persist($step10);
        $this->em->persist($step11);
        $this->em->persist($step12);
        $this->em->persist($step13);
        $this->em->persist($step14);
        $this->em->persist($step15);
        $this->em->persist($step16);
        $this->em->persist($step17);
        $this->em->persist($step18);
        $this->em->persist($step19);
        $this->em->persist($step20);
        $this->em->persist($step21);
        $this->em->persist($step22);
        $this->em->persist($step23);
        $this->em->persist($step24);
        $this->em->persist($step25);
        $this->em->persist($step26);
        $this->em->persist($step27);
        $this->em->persist($step28);
        $this->em->persist($step29);
        $this->em->persist($step30);


        $this->em->flush();

    }


}