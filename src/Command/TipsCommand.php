<?php
/**
 * Created by PhpStorm.
 * User: starwox
 * Date: 10/07/2020
 * Time: 16:09
 */

namespace App\Command;

use App\Entity\News;
use App\Entity\Step;
use App\Entity\Tag;
use App\Entity\Tips;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TipsCommand extends Command
{
    /**
     * StatusCommand constructor.
     * @var EntityManagerInterface $em
     */
    private $em;

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'tips:insert-data';

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription("Insert Tips Data on database")
            ->addArgument('tag', InputArgument::REQUIRED, "Tag ID needed")
            ->setHelp("Add argument: 1 => Dechets / 2 => Style de vie / 3 => A la maison / 4 => Consommation / 5 => Numérique");
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {

        $repository = $this->em->getRepository(Step::class);

        switch ($input->getArgument('tag')){
            case 1:
                // La plage
                $step1 = $repository->findBy(["name" => "La plage"]);

                $tips = new Tips();
                $tips->setContent("Ramènes un cendrier de poche si tu fumes");
                $tips->setStep($step1[0]);

                $tips2 = new Tips();
                $tips2->setContent("Utilises de la crème solaire naturelle");
                $tips2->setStep($step1[0]);

                $tips3 = new Tips();
                $tips3->setContent("Laisser la faune et la flaure tranquille");
                $tips3->setStep($step1[0]);

                // Les emballages
                $step2 = $repository->findBy(["name" => "Les emballages"]);

                $tips4 = new Tips();
                $tips4->setContent("Gel douche remplacé par du savon");
                $tips4->setStep($step2[0]);

                $tips5 = new Tips();
                $tips5->setContent("Shampooing remplacé par du shampooing solide");
                $tips5->setStep($step2[0]);

                $tips6 = new Tips();
                $tips6->setContent("Dentifrice remplacé par du dentifrice solide");
                $tips6->setStep($step2[0]);

                // Le ramassage
                $step3 = $repository->findBy(["name" => "Le ramassage"]);

                $tips7 = new Tips();
                $tips7->setContent("Faites le avec un ou des amis !");
                $tips7->setStep($step3[0]);

                $tips8 = new Tips();
                $tips8->setContent("Trouvez un lieu et définissez le périmètre à nettoyer");
                $tips8->setStep($step3[0]);

                $tips9 = new Tips();
                $tips9->setContent("Prévoir la gestion des déchets ramassés");
                $tips9->setStep($step3[0]);

                // Le recyclage
                $step4 = $repository->findBy(["name" => "Le recyclage"]);

                $tips10 = new Tips();
                $tips10->setContent("Mets un autocollant Stop-Pub sur votre boîte aux lettres");
                $tips10->setStep($step4[0]);

                $tips11 = new Tips();
                $tips11->setContent("Imprimes deux pages par feuille, recto-verso");
                $tips11->setStep($step4[0]);

                $tips12 = new Tips();
                $tips12->setContent("Adoptes des logiciels qui facilitent la circulation numérique des documents.");
                $tips12->setStep($step4[0]);

                // Se limiter
                $step5 = $repository->findBy(["name" => "Se limiter"]);

                $tips13 = new Tips();
                $tips13->setContent("Ne compactez pas les bouteilles plastiques");
                $tips13->setStep($step5[0]);

                $tips14 = new Tips();
                $tips14->setContent("Ne jetez pas votre vaisselle dans le bac à verre");
                $tips14->setStep($step5[0]);

                $tips15 = new Tips();
                $tips15->setContent("Ne jetez pas tous les contenants en plastique dans la poubelle recyclable");
                $tips15->setStep($step5[0]);

                // Les cottons tiges
                $step6 = $repository->find(51);

                $tips16 = new Tips();
                $tips16->setContent("Achète un coton-tiges réutilisable");
                $tips16->setStep($step6);

                $tips17 = new Tips();
                $tips17->setContent("Achète des coton-tiges avec tige en papier recyclé");
                $tips17->setStep($step6);

                $tips18 = new Tips();
                $tips18->setContent("Utilise du spray nettoyant");
                $tips18->setStep($step6);


                $this->em->persist($tips);
                $this->em->persist($tips2);
                $this->em->persist($tips3);
                $this->em->persist($tips4);
                $this->em->persist($tips5);
                $this->em->persist($tips6);
                $this->em->persist($tips7);
                $this->em->persist($tips8);
                $this->em->persist($tips9);
                $this->em->persist($tips10);
                $this->em->persist($tips11);
                $this->em->persist($tips12);
                $this->em->persist($tips13);
                $this->em->persist($tips14);
                $this->em->persist($tips15);
                $this->em->persist($tips16);
                $this->em->persist($tips17);
                $this->em->persist($tips18);
                $this->em->flush();
                break;
            case 2:
                // Se déplacer
                $step1 = $repository->findBy(["name" => "Se déplacer"]);

                $tips = new Tips();
                $tips->setContent("Organiser vous en co voiturage pour aller au travail");
                $tips->setStep($step1[0]);

                $tips2 = new Tips();
                $tips2->setContent("Prendre le vélo pour tes déplacements");
                $tips2->setStep($step1[0]);

                $tips3 = new Tips();
                $tips3->setContent("Marcel est une offre de VTC 100% électrique");
                $tips3->setStep($step1[0]);

                // S'habiller
                $step2 = $repository->findBy(["name" => "S'habiller"]);

                $tips4 = new Tips();
                $tips4->setContent("Donner vos vêtements au lieu de les jeter");
                $tips4->setStep($step2[0]);

                $tips5 = new Tips();
                $tips5->setContent("Acheter d’occasion (friperie, site de revente en ligne..)");
                $tips5->setStep($step2[0]);

                $tips6 = new Tips();
                $tips6->setContent("Priviligiez les marques éthiques et les vêtements recycler");
                $tips6->setStep($step2[0]);

                // La créativité
                $step3 = $repository->findBy(["name" => "La créativité"]);

                $tips7 = new Tips();
                $tips7->setContent("Transformez une cannette de coca en pot de fleure");
                $tips7->setStep($step3[0]);

                $tips8 = new Tips();
                $tips8->setContent("Construisez une maison en carton pour votre enfant");
                $tips8->setStep($step3[0]);

                $tips9 = new Tips();
                $tips9->setContent("Découpez votre carton pour en faire des dessous de verres");
                $tips9->setStep($step3[0]);

                // La soif
                $step4 = $repository->findBy(["name" => "La soif"]);

                $tips10 = new Tips();
                $tips10->setContent("Boire l'eau du robinet plutôt que l'eau en bouteille");
                $tips10->setStep($step4[0]);

                $tips11 = new Tips();
                $tips11->setContent("Acheter une gourde réutilisable (inox de préférence)");
                $tips11->setStep($step4[0]);

                $tips12 = new Tips();
                $tips12->setContent("Vittel à lancé la première bouteille d’eau 75cl fabriquée avec 100% de plastique recyclé");
                $tips12->setStep($step4[0]);

                // Le sport
                $step5 = $repository->findBy(["name" => "Le sport"]);

                $tips13 = new Tips();
                $tips13->setContent("Privilegier un déodorant éthique");
                $tips13->setStep($step5[0]);

                $tips14 = new Tips();
                $tips14->setContent("Fais un footing tout en ramassant les déchets sur votre chemin");
                $tips14->setStep($step5[0]);

                $tips15 = new Tips();
                $tips15->setContent("Cherches une salle de sport écologique");
                $tips15->setStep($step5[0]);

                // La fête
                $step6 = $repository->find(111);

                $tips16 = new Tips();
                $tips16->setContent("Privilégier les festivales avec toilettes sèches");
                $tips16->setStep($step6);

                $tips17 = new Tips();
                $tips17->setContent("Réutilises ton gobelet quand tu te re paye à boire");
                $tips17->setStep($step6);

                $tips18 = new Tips();
                $tips18->setContent("N’hésites pas à ramasser des déchets qui traine");
                $tips18->setStep($step6);


                $this->em->persist($tips);
                $this->em->persist($tips2);
                $this->em->persist($tips3);
                $this->em->persist($tips4);
                $this->em->persist($tips5);
                $this->em->persist($tips6);
                $this->em->persist($tips7);
                $this->em->persist($tips8);
                $this->em->persist($tips9);
                $this->em->persist($tips10);
                $this->em->persist($tips11);
                $this->em->persist($tips12);
                $this->em->persist($tips13);
                $this->em->persist($tips14);
                $this->em->persist($tips15);
                $this->em->persist($tips16);
                $this->em->persist($tips17);
                $this->em->persist($tips18);
                $this->em->flush();


                break;
            case 3:
                // La viande
                $step1 = $repository->findBy(["name" => "La viande"]);

                $tips = new Tips();
                $tips->setContent("Privilégier les légumes et les fruits");
                $tips->setStep($step1[0]);

                $tips2 = new Tips();
                $tips2->setContent("Les haricots et les lentilles sont riche en fibres et en protéines");
                $tips2->setStep($step1[0]);

                $tips3 = new Tips();
                $tips3->setContent("Choisir un jour spécifique par semaine pour exclure la viande");
                $tips3->setStep($step1[0]);

                // Les saisons
                $step2 = $repository->findBy(["name" => "Les saisons"]);

                $tips4 = new Tips();
                $tips4->setContent("Potager City respecte le cycle des saisons en proposant des fruits & légumes récoltés à maturité");
                $tips4->setStep($step2[0]);

                $tips5 = new Tips();
                $tips5->setContent("Prépares tes conserves maison pour en profiter tout le reste de l’année");
                $tips5->setStep($step2[0]);

                $tips6 = new Tips();
                $tips6->setContent("Consultes un calendrier des fruits et légumes avant de faire tes courses");
                $tips6->setStep($step2[0]);

                // Acheter local
                $step3 = $repository->findBy(["name" => "Acheter local"]);

                $tips7 = new Tips();
                $tips7->setContent("Moins ils auront voyagé, plus les fruits et légumes seront frais et gouteux");
                $tips7->setStep($step3[0]);

                $tips8 = new Tips();
                $tips8->setContent("Privilégier les fruits et légumes bio");
                $tips8->setStep($step3[0]);

                $tips9 = new Tips();
                $tips9->setContent("Eviter la viande");
                $tips9->setStep($step3[0]);

                // Le nettoyage
                $step4 = $repository->findBy(["name" => "Le nettoyage"]);

                $tips10 = new Tips();
                $tips10->setContent("Le citron néttoie parfaitement votre four à micro-onde");
                $tips10->setStep($step4[0]);

                $tips11 = new Tips();
                $tips11->setContent("Faites votre popre lessive écologique");
                $tips11->setStep($step4[0]);

                $tips12 = new Tips();
                $tips12->setContent("Utiliser du vinaigre pour éviter le calcaire");
                $tips12->setStep($step4[0]);

                // L'hygiène
                $step5 = $repository->findBy(["name" => "L'hygiène"]);

                $tips13 = new Tips();
                $tips13->setContent("Serviettes hygiéniques jetables ou tampons remplacés par la cup ou des serviettes hygiéniques lavables");
                $tips13->setStep($step5[0]);

                $tips14 = new Tips();
                $tips14->setContent("Eviter les lingettes non bio dégradable et ne jamais les jeter dans les toillettes");
                $tips14->setStep($step5[0]);

                $tips15 = new Tips();
                $tips15->setContent("Remplacer les coton tiges par des \"cure-oreille\" (en pharmacie, ou voir \"oriculi\" sur le net");
                $tips15->setStep($step5[0]);

                // La cuisine
                $step6 = $repository->find(171);

                $tips16 = new Tips();
                $tips16->setContent("Cuisines un maximum toi même et évites les repas preparés avec emballage");
                $tips16->setStep($step6);

                $tips17 = new Tips();
                $tips17->setContent("Fais tes courses en vrac avec tes propres contenants réutilisables");
                $tips17->setStep($step6);

                $tips18 = new Tips();
                $tips18->setContent("Demander à mettre ton fromage ou ta viande dans ton tuperware chez le boucher/fromager");
                $tips18->setStep($step6);


                $this->em->persist($tips);
                $this->em->persist($tips2);
                $this->em->persist($tips3);
                $this->em->persist($tips4);
                $this->em->persist($tips5);
                $this->em->persist($tips6);
                $this->em->persist($tips7);
                $this->em->persist($tips8);
                $this->em->persist($tips9);
                $this->em->persist($tips10);
                $this->em->persist($tips11);
                $this->em->persist($tips12);
                $this->em->persist($tips13);
                $this->em->persist($tips14);
                $this->em->persist($tips15);
                $this->em->persist($tips16);
                $this->em->persist($tips17);
                $this->em->persist($tips18);
                $this->em->flush();
                break;
            case 4:
                // Le chauffage
                $step1 = $repository->findBy(["name" => "Le chauffage"]);

                $tips = new Tips();
                $tips->setContent("Ne laisses pas la chaleur s’échapper en fermant tes portes");
                $tips->setStep($step1[0]);

                $tips2 = new Tips();
                $tips2->setContent("Utilises la chaleur du soleil en ouvrant tes volets ou rideaux la journée");
                $tips2->setStep($step1[0]);

                $tips3 = new Tips();
                $tips3->setContent("Les températures idéales sont de 19 degré pour les pièces et 17 pour les chambres");
                $tips3->setStep($step1[0]);

                // La nourriture
                $step2 = $repository->findBy(["name" => "La nourriture"]);

                $tips4 = new Tips();
                $tips4->setContent("Congèles ce qui est en trop");
                $tips4->setStep($step2[0]);

                $tips5 = new Tips();
                $tips5->setContent("Demandes à repartir avec des doggy-bag au restaurant");
                $tips5->setStep($step2[0]);

                $tips6 = new Tips();
                $tips6->setContent("Prépares toi un bon repas avec tout les restes du frigo");
                $tips6->setStep($step2[0]);

                // L'électricité
                $step3 = $repository->findBy(["name" => "L'électricité"]);

                $tips7 = new Tips();
                $tips7->setContent("Eteindre les lumières en quittant une pièce à chaque fois");
                $tips7->setStep($step3[0]);

                $tips8 = new Tips();
                $tips8->setContent("Utiliser des ampoules basses consommation");
                $tips8->setStep($step3[0]);

                $tips9 = new Tips();
                $tips9->setContent("Débrancher les appareils électrique et multiprise");
                $tips9->setStep($step3[0]);

                // Se laver
                $step4 = $repository->findBy(["name" => "Se laver"]);

                $tips10 = new Tips();
                $tips10->setContent("Prendre des douches plus courtes");
                $tips10->setStep($step4[0]);

                $tips11 = new Tips();
                $tips11->setContent("Changer pour un pommeau de douche économisateur d’eau");
                $tips11->setStep($step4[0]);

                $tips12 = new Tips();
                $tips12->setContent("Eviter les bains");
                $tips12->setStep($step4[0]);

                // L'eau
                $step5 = $repository->findBy(["name" => "L'eau"]);

                $tips13 = new Tips();
                $tips13->setContent("Eviter de laisser couler de l’eau inutilement");
                $tips13->setStep($step5[0]);

                $tips14 = new Tips();
                $tips14->setContent("Chasser moins d’eau dans les toilettes");
                $tips14->setStep($step5[0]);

                $tips15 = new Tips();
                $tips15->setContent("Réutiliser l’eau de pluie pour ses plantes");
                $tips15->setStep($step5[0]);

                // Le composteur
                $step6 = $repository->find(231);

                $tips16 = new Tips();
                $tips16->setContent("Chercher des composteurs collectifs autour de chez vous");
                $tips16->setStep($step6);

                $tips17 = new Tips();
                $tips17->setContent("Tout les déchets végétaux et organiques ménagers sont autorisés");
                $tips17->setStep($step6);

                $tips18 = new Tips();
                $tips18->setContent("Ne jamais mettre plus de 25% du même déchet dans un composteur");
                $tips18->setStep($step6);


                $this->em->persist($tips);
                $this->em->persist($tips2);
                $this->em->persist($tips3);
                $this->em->persist($tips4);
                $this->em->persist($tips5);
                $this->em->persist($tips6);
                $this->em->persist($tips7);
                $this->em->persist($tips8);
                $this->em->persist($tips9);
                $this->em->persist($tips10);
                $this->em->persist($tips11);
                $this->em->persist($tips12);
                $this->em->persist($tips13);
                $this->em->persist($tips14);
                $this->em->persist($tips15);
                $this->em->persist($tips16);
                $this->em->persist($tips17);
                $this->em->persist($tips18);
                $this->em->flush();

                break;
            case 5:
                // La pollution
                $step1 = $repository->findBy(["name" => "La pollution"]);

                $tips = new Tips();
                $tips->setContent("Nettoyer régulièrement votre boîte mail");
                $tips->setStep($step1[0]);

                $tips2 = new Tips();
                $tips2->setContent("Eteindre sa box pendant la nuit");
                $tips2->setStep($step1[0]);

                $tips3 = new Tips();
                $tips3->setContent("Bloquer les spams ou se désabonner des newsletters inutiles");
                $tips3->setStep($step1[0]);

                // Au travail
                $step2 = $repository->findBy(["name" => "Au travail"]);

                $tips4 = new Tips();
                $tips4->setContent("Eviter les couverts jetables le midi");
                $tips4->setStep($step2[0]);

                $tips5 = new Tips();
                $tips5->setContent("Diminuer la clime et le chauffage au bureau");
                $tips5->setStep($step2[0]);

                $tips6 = new Tips();
                $tips6->setContent("Ne pas oublier de faire du tri séléctif même au travail");
                $tips6->setStep($step2[0]);

                // Le streaming
                $step3 = $repository->findBy(["name" => "Le streaming"]);

                $tips7 = new Tips();
                $tips7->setContent("Eviter de regarder tout le temps des vidéos en haute définition");
                $tips7->setStep($step3[0]);

                $tips8 = new Tips();
                $tips8->setContent("Eviter de regarder des replays");
                $tips8->setStep($step3[0]);

                $tips9 = new Tips();
                $tips9->setContent("Moins regarder de vidéos pornos");
                $tips9->setStep($step3[0]);

                // Les données
                $step4 = $repository->findBy(["name" => "Les données"]);

                $tips10 = new Tips();
                $tips10->setContent("Eviter les objets connectés inutiles");
                $tips10->setStep($step4[0]);

                $tips11 = new Tips();
                $tips11->setContent("Privilégiez le stockage de données localement et non sur le cloud");
                $tips11->setStep($step4[0]);

                $tips12 = new Tips();
                $tips12->setContent("Utiliser des disques dur externes");
                $tips12->setStep($step4[0]);

                // L'obsolescence
                $step5 = $repository->findBy(["name" => "L'obsolescence"]);

                $tips13 = new Tips();
                $tips13->setContent("N’achètes pas un nouveau smartphone dès sa sortie si le tien fonctionne encore");
                $tips13->setStep($step5[0]);

                $tips14 = new Tips();
                $tips14->setContent("Penser à faire réparer ses appareils plutôt que d’en racheter ou de les jeter");
                $tips14->setStep($step5[0]);

                $tips15 = new Tips();
                $tips15->setContent("Acheter d’occasion ou reconditionné");
                $tips15->setStep($step5[0]);

                // Le téléphone
                $step6 = $repository->find(291);

                $tips16 = new Tips();
                $tips16->setContent("Se mettre en mode économie d’énergie");
                $tips16->setStep($step6);

                $tips17 = new Tips();
                $tips17->setContent("Fermer ses applications lorsqu’on les utilise pas");
                $tips17->setStep($step6);

                $tips18 = new Tips();
                $tips18->setContent("Moins consommer de vidéos inutiles");
                $tips18->setStep($step6);


                $this->em->persist($tips);
                $this->em->persist($tips2);
                $this->em->persist($tips3);
                $this->em->persist($tips4);
                $this->em->persist($tips5);
                $this->em->persist($tips6);
                $this->em->persist($tips7);
                $this->em->persist($tips8);
                $this->em->persist($tips9);
                $this->em->persist($tips10);
                $this->em->persist($tips11);
                $this->em->persist($tips12);
                $this->em->persist($tips13);
                $this->em->persist($tips14);
                $this->em->persist($tips15);
                $this->em->persist($tips16);
                $this->em->persist($tips17);
                $this->em->persist($tips18);
                $this->em->flush();

                break;
            default:
                $output->writeln("
                Add argument: 1 => Dechets / 2 => Style de vie / 3 => A la maison / 4 => Consommation / 5 => Numérique
                ");
                break;

        }

        return Command::SUCCESS;
    }
}