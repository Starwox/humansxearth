<?php
/**
 * Created by PhpStorm.
 * User: starwox
 * Date: 10/07/2020
 * Time: 15:12
 */

namespace App\Command;

use App\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TagCommand extends Command
{

    /**
     * StatusCommand constructor.
     * @var EntityManagerInterface $em
     */
    private $em;

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'tag:insert-data';

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription("Insert Tags Data on database");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $tag = new Tag();
        $tag->setName('Déchets');

        $tag2 = new Tag();
        $tag2->setName("Style de vie");

        $tag3 = new Tag();
        $tag3->setName("À la maison");

        $tag4 = new Tag();
        $tag4->setName("Consommation");

        $tag5 = new Tag();
        $tag5->setName("Numérique");

        $this->em->persist($tag);
        $this->em->persist($tag2);
        $this->em->persist($tag3);
        $this->em->persist($tag4);
        $this->em->persist($tag5);
        $this->em->flush();


        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;
    }
}