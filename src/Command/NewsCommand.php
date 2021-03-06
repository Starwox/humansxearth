<?php
/**
 * Created by PhpStorm.
 * User: starwox
 * Date: 10/07/2020
 * Time: 15:49
 */

namespace App\Command;

use App\Entity\News;
use App\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class NewsCommand extends Command
{
    /**
     * StatusCommand constructor.
     * @var EntityManagerInterface $em
     */
    private $em;

    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'news:insert-data';

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setDescription("Insert News Data on database");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $repository = $this->em->getRepository(Tag::class);
        $tagDechet = $repository->find(1);

        // Dechets 1
        $news = new News();
        $news->setName("Le Top 10 des déchets collectés sur les plages");
        $news->setContent("
        l'ONG Surfrider a mené le premier recensement des déchets qui polluent cinq sites français et espagnols. Bilan : les plastiques restent les " . '"premiers prédateurs des océans"'
        );
        $news->setTags($tagDechet);
        $news->setLink("https://www.lesechos.fr/2016/04/le-top-10-des-dechets-collectes-sur-les-plages-205477");
        $news->setAuthor("Les Echos");

        // Dechets 2
        $news2 = new News();
        $news2->setName("Les bobos de la plage");
        $news2->setContent("
            La mer, c'est sale ! Mais pas tellement à cause des poissons qui baisent dedans, comme le prétend Renaud. Car c'est bien l'homme qui est à l'origine de la plupart des pollutions maritimes : déversements d'hydrocarbure, eaux souillées en provenance d'usines ou d'égouts, pesticides ou matières organiques issus de l'agriculture… Mais quelles sont les conséquences sur la santé et où peut-on se baigner ?
        ");
        $news2->setTags($tagDechet);
        $news2->setLink("https://www.routard.com/dossier-pratique-sur-le-voyage/cid137620-les-bobos-de-la-plage.html?page=3");
        $news2->setAuthor("Routards");

        // Dechets 3
        $news3 = new News();
        $news3->setName("DIY : Fabriquer son dentifrice solide");
        $news3->setContent("
            La plupart des dentifrices industriels en tube contiennent des substances nocives pour l’environnement et notre organisme. Si vous souhaitez adopter une démarche zéro déchet et respectueuse de la planète, vous pouvez opter pour le dentifrice solide, qui permet de n’utiliser que des contenants durables. Et si vous le fabriquiez vous-même ? Nous vous guidons dans la réalisation de votre dentifrice solide maison.
        ");
        $news3->setTags($tagDechet);
        $news3->setLink("https://alternativi.fr/diy-fabriquer-son-dentifrice-solide/417#:~:text=Pour%20fabriquer%20votre%20dentifrice%20solide,de%20l'huile%20de%20coco");
        $news3->setAuthor("Alternativi");

        // Dechets 4
        $news4 = new News();
        $news4->setName("Pourquoi Et Comment Fabriquer Son Shampoing Maison");
        $news4->setContent("
            Fabriquer son shampoing maison, on pourrait penser que c’est très compliqué. Une illusion créée par le fait que les shampoings du commerce contiennent des dizaines d’ingrédients. En réalité, un shampoing efficace et adapté à votre type de cheveux ne nécessite que quelques ingrédients et environ une demi-heure de préparation        
        ");
        $news4->setTags($tagDechet);
        $news4->setLink("https://www.econo-ecolo.org/comment-fabriquer-shampoing-maison/");
        $news4->setAuthor("Econo Ecolo");

        // Dechets 5
        $news5 = new News();
        $news5->setName("LES DÉCHETS EN FRANCE : QUELQUES CHIFFRES");
        $news5->setContent("
            Chaque année en France, un habitant produit 354 kg d’ordures ménagères. Les calculs sont réalisés par l’Ademe à partir des tonnages des poubelles des ménages (hors déchets verts) collectées par les collectivités locales.
        ");
        $news5->setTags($tagDechet);
        $news5->setLink("https://www.cniid.org/Les-dechets-en-France-quelques-chiffres,151");
        $news5->setAuthor("CNIID");

        // Dechets 6
        $news6 = new News();
        $news6->setName("OBJECTIF : ZÉRO DÉCHET SUR LES ROUTES !");
        $news6->setContent("
            Des canettes, des papiers, des peaux de bananes, des mégots… Et si on se débarrassait de cette habitude qui consiste à jeter ses détritus directement par la fenêtre de sa voiture ? On passe au zéro déchet !
            Parce que la route est plus belle quand on ne la prend pas pour une poubelle, Chacun sa Route fait le ménage sur les déchets.  Zoom sur des initiatives qui font avancer les choses !
        ");
        $news6->setTags($tagDechet);
        $news6->setLink("https://www.chacun-sa-route.fr/zero-dechet-sur-les-routes.html");
        $news6->setAuthor("Chacun sa route");

        // Dechets 7
        $news7 = new News();
        $news7->setName("Le papier est-il mauvais pour l’environnement ?");
        $news7->setContent("
            La fabrication du papier pollue l'environnement et contribue à la déforestation, tandis que le numérique sauve la planète. Voici une idée reçue dont nous devons nous méfier. Convaincues de cette fausse bonne idée, la plupart des entreprises privilégient l’envoi par courrier électronique et la plupart de nos données se retrouvent dans un cloud, dont nous ignorons souvent ce qu’il est. Pourtant, le stockage et les échanges de données numériques ne se font pas sans consommer d’énergie.
        ");
        $news7->setTags($tagDechet);
        $news7->setLink("https://ecotree.green/blog/le-papier-est-il-mauvais-pour-l-environnement");
        $news7->setAuthor("Ecotree");

        // Dechets 8
        $news8 = new News();
        $news8->setName("Consommer du papier, un crime écologique?");
        $news8->setContent("
            «Pensez à l’environnement, n’imprimez pas cet email»: avec la dématérialisation des supports, le papier semble être un archaïsme dont il serait bon de se défaire pour le bien de la planète. Pourtant, à bien y regarder, le papier n’est pas forcément le désastre écologique qu’on l’accuse d’être. 20 Minutes (dont l’impression se fait sur du papier recyclé – NDLR) a feuilleté les idées reçues sur le papier.
        ");
        $news8->setTags($tagDechet);
        $news8->setLink("https://www.20minutes.fr/planete/1465187-20141021-consommer-papier-crime-ecologique");
        $news8->setAuthor("20 Minutes");

        // Dechets 9
        $news9 = new News();
        $news9->setName("La Malaisie renvoie 150 conteneurs de déchets vers plusieurs pays dont la France");
        $news9->setContent("
            La Malaisie a indiqué avoir renvoyé 150 conteneurs contenant quelque 3.737 tonnes de déchets, dont 43 vers la France, 42 vers le Royaume-Uni, 17 vers les États-Unis et 11 vers le Canada.
        ");
        $news9->setTags($tagDechet);
        $news9->setLink("https://www.sciencesetavenir.fr/nature-environnement/la-malaisie-renvoie-150-conteneurs-de-dechets-vers-plusieurs-pays-dont-la-france_140628");
        $news9->setAuthor("Sciences et Avenir");

        // Dechets 10
        $news10 = new News();
        $news10->setName("\"Made in Everest\" : comment les déchets qui jonchent le plus haut sommet du monde trouvent une seconde vie");
        $news10->setContent("
            Chaque année, les centaines d'alpinistes qui se pressent sur les flancs de l'Everest laissent derrière eux de nombreux déchets. Aujourd'hui, grâce aux efforts des autorités et bénévoles, plusieurs tonnes sont redescendues et recyclées.
        ");
        $news10->setTags($tagDechet);
        $news10->setLink("https://www.sciencesetavenir.fr/nature-environnement/pollution/au-nepal-le-recyclage-des-dechets-de-l-everest_138409");
        $news10->setAuthor("Sciences et Avenir");

        // Dechets 11
        $news11 = new News();
        $news11->setName("Pourquoi les coton-tiges sont une catastrophe pour les plages");
        $news11->setContent("
            Rejetés à l'entrée des stations d'épuration, les coton-tiges sont un des déchets les plus fréquemment retrouvés sur les plages. Ils seront interdits dès le 1er janvier 2020.
        ");
        $news11->setTags($tagDechet);
        $news11->setLink("https://www.lexpress.fr/actualite/societe/environnement/pourquoi-les-coton-tiges-sont-une-catastrophe-pour-les-plages_1932434.html");
        $news11->setAuthor("L'express");

        // Dechets 12
        $news12 = new News();
        $news12->setName("Trop dangereux et polluants, les cotons-tiges en plastique ont disparu des rayons");
        $news12->setContent("
                Le Parlement a voté la proscription de ces bâtonnets des rayons au 1er janvier 2018, dans la loi pour la reconquête de la biodiversité, de la nature et des paysages.
        ");
        $news12->setTags($tagDechet);
        $news12->setLink("https://www.laprovence.com/article/ecoplanete/4778793/environnement-les-cotons-tiges-en-plastique-sont-desormais-interdits-a-la-vente-aux-particuliers.html");
        $news12->setAuthor("La Provence");


        $this->em->persist($news);
        $this->em->persist($news2);
        $this->em->persist($news3);
        $this->em->persist($news4);
        $this->em->persist($news5);
        $this->em->persist($news6);
        $this->em->persist($news7);
        $this->em->persist($news8);
        $this->em->persist($news9);
        $this->em->persist($news10);
        $this->em->persist($news11);
        $this->em->persist($news12);




        $tagSDV = $repository->find(11);

        // Style de Vie 1
        $news13 = new News();
        $news13->setName("Les moyens de transport écologiques");
        $news13->setContent("
        Vous avez depuis longtemps renoncé à prendre votre voiture pour de petits trajets. Désireux de protéger notre belle planète, vous avez vite fait une croix sur votre trajet seul dans votre véhicule, chantant à tue-tête jusqu’à vous en casser la voix. Même si vous êtes un peu nostalgique de cette période, vous ne regrettez pas votre choix.
        ");
        $news13->setTags($tagSDV);
        $news13->setLink("https://www.groupito.com/blog/insolite/les-moyens-de-transport-ecologiques/");
        $news13->setAuthor("Groupito");

        // Style de Vie 2
        $news14 = new News();
        $news14->setName("SE DÉPLACER AUTREMENT");
        $news14->setContent("
            Les réserves d’énergie fossile s’épuisent, les rejets de gaz à effet de serre et la pollution augmente. Pourtant le nombre de voitures en circulation dans le monde ne cesse d’augmenter et, à ce rythme, le parc automobile mondial risque d’atteindre un milliard d’unités en 2030…
        ");
        $news14->setTags($tagSDV);
        $news14->setLink("https://www.colibris-lemouvement.org/passer-a-laction/agir-quotidien/se-deplacer-autrement");
        $news14->setAuthor("Colibris");

        // Style de Vie 3
        $news15 = new News();
        $news15->setName("Pollution : le grand gâchis des vêtements usagés");
        $news15->setContent("
            Des combinaisons de skis démodées, des draps fleuris aux couleurs fanées, des tonnes de layettes à peine tachées… 240 000 t de textiles usagés sont récupérés chaque année en France. Ceux qu'on appelle les « chiffonniers », qui collectent et revalorisent nos vieilles fringues, sont un bon baromètre de l'état de l'industrie de la mode.
        ");
        $news15->setTags($tagSDV);
        $news15->setLink("https://www.leparisien.fr/environnement/pollution-le-grand-gachis-des-vetements-usages-24-01-2020-8243220.php");
        $news15->setAuthor("Le Parisien");

        // Style de Vie 4
        $news16 = new News();
        $news16->setName("LA POLLUTION DES VÊTEMENTS SUR L’ENVIRONNEMENT");
        $news16->setContent("
            Derrière l’acte anodin d’acheter un vêtement se cache des chiffres affolants !
            80 milliards de vêtements fabriqués dans le monde par année.
            700 000 tonnes de vêtements achetés en France
            En plus du désastre sociétal qu’impose l’industrie textile, il faut aujourd’hui toujours produire plus pour moins cher.
        ");
        $news16->setTags($tagSDV);
        $news16->setLink("https://www.yocty.com/vetement-danger-environnement");
        $news16->setAuthor("Yocty");

        // Style de Vie 5
        $news17 = new News();
        $news17->setName("Upcycling, rien ne se perd, tout se transforme");
        $news17->setContent("
            « Rien ne se perd, rien ne se crée, tout se transforme » ! Cet aphorisme que l’on prête à Lavoisier prend tout son sens dans le concept même d’upcycling. L’idée est simple : transformer un matériau, quel qu’il soit, en objet qui a de la valeur.
        ");
        $news17->setTags($tagSDV);
        $news17->setLink("https://www.consoglobe.com/upcycling-rien-ne-se-perd-tout-se-transforme-cg");
        $news17->setAuthor("ConsoGlobe");

        // Style de Vie 6
        $news18 = new News();
        $news18->setName("L'\"upcycling\" mode, une démarche éthique qui gagne du terrain");
        $news18->setContent("
            Porté à l'étranger par le succès d'enseignes telles que Reformation, l'upcycling, ou \"surcyclage\" en français, permet de donner une seconde vie aux vêtements et tissus usagés en les transformant en pièces neuves. Cette tendance à la mode circulaire émerge peu à peu en France.
        ");
        $news18->setTags($tagSDV);
        $news18->setLink("https://www.lexpress.fr/styles/mode/comment-l-upcycling-mode-redonne-vie-aux-vieux-vetements_1878176.html");
        $news18->setAuthor("L'Express");

        // Style de Vie 7
        $news19 = new News();
        $news19->setName("Eau en bouteille ou du robinet: le match en chiffres");
        $news19->setContent("
            Les Français boivent-ils beaucoup d'eau en bouteilles? Combien coûte-t-elle par rapport à l'eau du robinet? Est-elle meilleure pour la santé? Cette industrie est-elle polluante? Des chiffres, des réponses.
        ");
        $news19->setTags($tagSDV);
        $news19->setLink("https://www.lexpress.fr/actualite/societe/environnement/eau-en-bouteille-ou-du-robinet-le-match-en-chiffres_859054.html");
        $news19->setAuthor("L'Express");

        // Style de Vie 8
        $news20 = new News();
        $news20->setName("Comment limiter sa consommation d’emballages");
        $news20->setContent("
            Chaque année, 90 milliards d’emballages passent entre les mains des Français ! Ils constituent désormais le volume le plus important du contenu des poubelles et finissent encore majoritairement dans une décharge ou un incinérateur. Pour enrayer ce fléau, le tri ne suffit pas. Il faut réduire les déchets d’emballage à la source.
        ");
        $news20->setTags($tagSDV);
        $news20->setLink("https://www.quechoisir.org/conseils-dechets-comment-limiter-sa-consommation-d-emballages-n9821/#:~:text=%C3%A0%20verser%20dans%20un%20flacon,3%20de%20d%C3%A9chets%20par%20an.");
        $news20->setAuthor("Que Choisir");

        // Style de Vie 9
        $news21 = new News();
        $news21->setName("Allier le sport à l’écologie, c’est possible");
        $news21->setContent("
            Le sport et l’écologie sont deux mondes qu’il est souvent difficile de concilier. Que ce soit à un niveau amateur ou professionnel, la pratique d’un sport est généralement polluante. Ainsi, le Tour de France, avec ses hélicoptères, ses motos et ses centaines de voitures (sans oublier les millions de goodies en plastique distribués par la caravane) est par exemple considéré comme un des événements sportifs les plus polluants du monde.
        ");
        $news21->setTags($tagSDV);
        $news21->setLink("https://fr.metrotime.be/2020/03/22/must-read/allier-le-sport-a-lecologie-cest-possible/#:~:text=Comme%20le%20reste%20du%20monde,d%C3%A9fis%20%C3%A9cologiques%20qui%20le%20bouleversent.&text=Que%20ce%20soit%20%C3%A0%20un,un%20sport%20est%20g%C3%A9n%C3%A9ralement%20polluante.");
        $news21->setAuthor("Metro Time");

        // Style de Vie 10
        $news22 = new News();
        $news22->setName("Le sport est-il écologique ?");
        $news22->setContent("
            À l’heure où Greta Thunberg défie Donald Trump à l’ONU, à l’heure où une course de voitures électriques se dispute chaque année dans Paris, à l’heure où les stades sont climatisés en été au Qatar, il est bien temps – avant qu’il ne soit trop tard – de savoir si “sport” et “respect de l’environnement” sont deux entités compatibles.
        ");
        $news22->setTags($tagSDV);
        $news22->setLink("https://wesportfr.com/le-sport-est-il-ecologique/");
        $news22->setAuthor("We Sport");

        // Style de Vie 11
        $news23 = new News();
        $news23->setName("Un éco-festival, c'est quoi ?");
        $news23->setContent("
            Créer un moment convivial et festif tout en respectant l’environnement, c’est le défi d’un éco-festival comme We Love Green, les Vieilles Charrues, Marsatac, etc. De l’énergie solaire à l’alimentation bio en passant par le tri des déchets, pour avoir une démarche respectueuse de l’environnement, chaque geste compte !
        ");
        $news23->setTags($tagSDV);
        $news23->setLink("https://www.mtaterre.fr/dossiers/organiser-un-festival-vert-cest-possible/un-eco-festival-cest-quoi");
        $news23->setAuthor("M Ta Terre");

        // Style de Vie 12
        $news24 = new News();
        $news24->setName("Cinq festivals éco-responsables à découvrir cet été");
        $news24->setContent("
            Consommation élevée d'eau et d'énergie, déchets plastiques à tout-va... Vous ne le saviez peut-être pas, mais les festivals de musique ont une empreinte carbone très élevée. Pour y pallier, de plus en plus d'événements se mettent au vert. ID vous propose d'en découvrir cinq. 
       ");
        $news24->setTags($tagSDV);
        $news24->setLink("https://www.linfodurable.fr/culture/cinq-festivals-eco-responsables-decouvrir-pour-cet-ete-10675");
        $news24->setAuthor("L'info durable");

        $this->em->persist($news13);
        $this->em->persist($news14);
        $this->em->persist($news15);
        $this->em->persist($news16);
        $this->em->persist($news17);
        $this->em->persist($news18);
        $this->em->persist($news19);
        $this->em->persist($news20);
        $this->em->persist($news21);
        $this->em->persist($news22);
        $this->em->persist($news23);
        $this->em->persist($news24);


        $taghome = $repository->find(21);


        // A la maison 1
        $news25 = new News();
        $news25->setName("Pourquoi la viande est-elle si nocive pour la planète ?");
        $news25->setContent("
            #UrgenceClimat. Les 323 millions de tonnes de viande produites dans le monde ont un impact majeur sur le réchauffement, la déforestation et la consommation d’eau.
        ");
        $news25->setTags($taghome);
        $news25->setLink("https://www.lemonde.fr/les-decodeurs/article/2018/12/11/pourquoi-la-viande-est-elle-si-nocive-pour-la-planete_5395914_4355770.html");
        $news25->setAuthor("Le Monde");

        // A la maison 2
        $news26 = new News();
        $news26->setName("Viande et réchauffement climatique : ce que disent les chiffres");
        $news26->setContent("
            ENVIRONNEMENT - L'élevage à des fins de consommation de viande contribue, c'est un fait, au réchauffement climatique. Mais comment ? Et surtout, à quel point ? À l'occasion de la publication d'une tribune \"Lundi vert\" appelant à ne plus manger de viande et de poisson le lundi, LCI fait le point sur les chiffres.
        ");
        $news26->setTags($taghome);
        $news26->setLink("https://www.lci.fr/planete/lundi-vert-viande-et-rechauffement-climatique-ce-que-disent-les-chiffres-et-ce-qu-ils-ne-disent-pas-2109456.html");
        $news26->setAuthor("LCI");

        // A la maison 3
        $news27 = new News();
        $news27->setName("Le calendrier des fruits et légumes");
        $news27->setContent("
            GRÂCE AU CALENDRIER DES FRUITS ET LÉGUMES, CHOISISSEZ VOS PRODUITS DE SAISON POUR PRÉPARER VOS CONSERVES MAISON, ET ENFERMEZ AINSI DANS VOS BOCAUX TOUTES LES BONNES SAVEURS DES ALIMENTS POUR EN PROFITER TOUT LE RESTE DE L’ANNÉE ! LES FRUITS ET LÉGUMES DE SAISON N'AURONT DÉSORMAIS PLUS DE SECRETS POUR VOUS.
        ");
        $news27->setTags($taghome);
        $news27->setLink("http://www.leparfait.fr/fruits-et-legumes-saison?gclid=CjwKCAjwxev3BRBBEiwAiB_PWCfrvPc32G2mPuVii_1YijAkozh6kVFHwvrECcBlfUkKl627iquNzRoCQd0QAvD_BwE");
        $news27->setAuthor("Le Parfait");

        // A la maison 4
        $news28 = new News();
        $news28->setName("Pourquoi consommer des fruits et légumes de saison ?");
        $news28->setContent("
            Les fruits et légumes de saison sont la base d’une alimentation équilibrée. Riche en fibres et minéraux, on ne vente plus leurs bénéfices sur la santé ! En plus d’être savoureuse et respectueuse de l’environnement, la consommation saisonnière permet de sortir de sa routine alimentaire en découvrant de nouveaux aliments et de varier les plaisirs.
        ");
        $news28->setTags($taghome);
        $news28->setLink("https://www.celinou.fr/blogs/le-blog-de-celinou/pourquoi-consommer-des-fruits-et-legumes-de-saison#:~:text=Consommer%20de%20saison%20ne%20pr%C3%A9sente,que%20ceux%20%C3%A9lev%C3%A9s%20sous%20serre");
        $news28->setAuthor("Celinou");

        // A la maison 5
        $news29 = new News();
        $news29->setName("Acheter local : une bonne action pour le climat");
        $news29->setContent("
            Difficile de consommer 100% belge dans un petit pays comme le nôtre. Mais à l’heure du défi climatique, de plus en plus de consommateurs veulent revenir à des produits locaux.
            Et ils ont raison car transporter les marchandises génère beaucoup de CO2. Acheter local permet ainsi d’éviter l’émission de 50 kg de CO2par personne et par an. C’est l’une des 16 actions de notre checklist climat, pour diviser les émissions de CO2 par deux en 10 ans.
        ");
        $news29->setTags($taghome);
        $news29->setLink("https://www.ecoconso.be/fr/content/acheter-local-une-bonne-action-pour-le-climat");
        $news29->setAuthor("EcoConso");

        // A la maison 6
        $news30 = new News();
        $news30->setName("Pourquoi Consommer Local n’est pas Toujours Bon pour la Planète ?");
        $news30->setContent("
            De plus en plus de consommateurs cherchent à adopter une alimentation plus locale : consommer en circuits courts, acheter français, acheter régional. Derrière cette tendance, plusieurs raisons : les consommateurs veulent protéger leur santé, mais aussi protéger la planète. Le problème, c’est que consommer local n’est pas toujours écolo !
        ");
        $news30->setTags($taghome);
        $news30->setLink("https://youmatter.world/fr/consommer-local-ecologie-environnement/");
        $news30->setAuthor("You Matter");

        // A la maison 7
        $news31 = new News();
        $news31->setName("9 produits ménagers écologiques et zéro déchet");
        $news31->setContent("
            Depuis quelques mois, le magazine 60 millions de consommateurs tire la sonnette d’alarme et alerte les consommateurs sur les effets néfastes des produits du quotidien. Après les produits d’hygiène féminine, les couches des bébés, les cosmétiques, c’est au tour des produits d’entretien de faire l’objet d’un dossier dédié.
        ");
        $news31->setTags($taghome);
        $news31->setLink("https://www.myslowlife.fr/2017/03/10/produits-menagers-ecologiques-zero-dechet/?fbclid=IwAR1igSnfUhued4I46stAvm07PGf5Le5KrTbsC71BgZUZRGqS9zO0fcqCbS0");
        $news31->setAuthor("My Slow Life");

        // A la maison 8
        $news32 = new News();
        $news32->setName("Pourquoi est-il urgent de passer aux produits de nettoyage écologiques ?");
        $news32->setContent("
            Parfum de propre, jolie couleur, promesses d’efficacité… Les produits de nettoyage sont pleins de ressources pour se valoriser et faire disparaître les produits naturels des chariots de ménage. Pourtant, ils contiennent souvent des substances nocives pouvant être corrosives ou allergisantes par exemple.
        ");
        $news32->setTags($taghome);
        $news32->setLink("https://www.cleany.fr/blog/produits-nettoyage-ecologiques/");
        $news32->setAuthor("Cleany");

        // A la maison 9
        $news33 = new News();
        $news33->setName("Les lingettes jetables, un torchon pour la planète");
        $news33->setContent("
            Impossibles à recycler, provoquant des bouchons dans les canalisations, les lingettes représentent une part non négligeable de nos déchets qui pourrait facilement être évitée.
        ");
        $news33->setTags($taghome);
        $news33->setLink("https://www.lexpress.fr/actualite/societe/environnement/les-lingettes-jetables-un-torchon-pour-la-planete_1933875.html");
        $news33->setAuthor("L'Express");

        // A la maison 10
        $news34 = new News();
        $news34->setName("Les lingettes jetables sont une catastrophe environnementale");
        $news34->setContent("
            Le nombre de déchets générés par ces lingettes jetables, qui pour certaines sont dites \"biodégradables\", s’élève à une dizaine de milliards en France.
        ");
        $news34->setTags($taghome);
        $news34->setLink("https://www.huffingtonpost.fr/entry/les-lingettes-jetables-sont-une-catastrophe-environnementale_fr_5cf0f7d0e4b0e8085e38222d");
        $news34->setAuthor("Huff Post");

        // A la maison 11
        $news35 = new News();
        $news35->setName("La Vérité sur le “Scandale” Sanitaire et Écologique des Emballages Alimentaires");
        $news35->setContent("
            Les anecdotes les plus ahurissantes se sont succédées dans les médias ces derniers temps, montrant les dérives des industries agro-alimentaires sur la question des emballages. Des bananes pré-pelées et emballées ? Des oranges emballées dans du plastique ? Une clémentine épluchée vendue dans une boîte ? Autant d’exemples qui ont déchaîné la colère des internautes au point qu’on a même parlé de “scandale”. À la suite de ces polémiques, nous avons décidé d’enquêter pour vous sur l’impact de ces emballages.
        ");
        $news35->setTags($taghome);
        $news35->setLink("https://youmatter.world/fr/emballages-alimentaires-environnement-sante/");
        $news35->setAuthor("You Matter");

        // A la maison 12
        $news36 = new News();
        $news36->setName("Emballages alimentaires : lesquels sont les plus écologiques ?");
        $news36->setContent("
            Des milliards de récipients sont utilisés chaque année pour transporter et conserver les aliments. Mais tous ne se valent pas : savez-vous par exemple qu'il faut réutiliser 18 fois une boîte en plastique pour qu'elle soit plus écologique qu'une barquette jetable ?
        ");
        $news36->setTags($taghome);
        $news36->setLink("https://www.futura-sciences.com/planete/actualites/developpement-durable-emballages-alimentaires-lesquels-sont-plus-ecologiques-74444/");
        $news36->setAuthor("Futura Sciences");

        $this->em->persist($news25);
        $this->em->persist($news26);
        $this->em->persist($news27);
        $this->em->persist($news28);
        $this->em->persist($news29);
        $this->em->persist($news30);
        $this->em->persist($news31);
        $this->em->persist($news32);
        $this->em->persist($news33);
        $this->em->persist($news34);
        $this->em->persist($news35);
        $this->em->persist($news36);



        $tagConso = $repository->find(31);

        // Consommation 1
        $news37 = new News();
        $news37->setName("Les effets du chauffage sur l'environnement");
        $news37->setContent("
            En Suisse, trois-quarts des ménages sont chauffés avec des combustibles fossiles: du mazout surtout (52%), et du gaz naturel (21%). La part du mazout baisse régulièrement depuis 30 ans, alors que celle du gaz naturel grimpe.
        ");
        $news37->setTags($tagConso);
        $news37->setLink("https://www.energie-environnement.ch/maison/renovation-et-chauffage/contexte/effets-du-chauffage-sur-l-environnement");
        $news37->setAuthor("Energie Environnement");

        // Consommation 2
        $news38 = new News();
        $news38->setName("Bilan des émissions de polluants des énergies");
        $news38->setContent("
            Le tableau ci-dessous montre que mis à part les vraies énergies renouvelables (dont les plus faciles à mettre en oeuvre sont le solaire et dans une moindre mesure l'éolien), toutes les énergies y compris l'électricité (hors énergie verte issue de l'hydraulique, du solaire et de l'éolien) émettent des polluants et des gaz à effet de serre.
        ");
        $news38->setTags($tagConso);
        $news38->setLink("https://www.picbleu.fr/page/bilan-des-emissions-de-polluants-des-energies");
        $news38->setAuthor("Pic Bleu");

        // Consommation 3
        $news39 = new News();
        $news39->setName("Gaspillage alimentaire : définition, enjeux et chiffres");
        $news39->setContent("
            10 millions de tonnes, 10 milliards de kilos : c'est le poids annuel du gaspillage alimentaire estimé chaque année en France. Un gâchis déconcertant qui a lieu à tous les étages, de la production à la consommation, en passant par la transformation, la distribution et la restauration. Depuis 2009, France Nature Environnement se bat contre ce scandale aussi bien éthique qu’environnemental et économique.
        ");
        $news39->setTags($tagConso);
        $news39->setLink("https://www.fne.asso.fr/dossiers/gaspillage-alimentaire-d%C3%A9finition-enjeux-et-chiffres");
        $news39->setAuthor("France Nature Environnement");

        // Consommation 4
        $news40 = new News();
        $news40->setName("Le gaspillage en quelques chiffres");
        $news40->setContent("
            Lorsqu’il s’agit du gaspillage alimentaire, les chiffres parlent d’eux-mêmes. Voici un florilège de statistiques qui donnent le tournis et qui nous invitent fortement à méditer… et à nous engager !
        ");
        $news40->setTags($tagConso);
        $news40->setLink("https://zero-gachis.com/fr/quelques-chiffres#:~:text=1%2C3%20milliard%20de%20tonnes,aliments%20produits%20sur%20la%20plan%C3%A8te%20!");
        $news40->setAuthor("Zero Gachis");

        // Consommation 5
        $news41 = new News();
        $news41->setName("Sources de pollution : l’électricité");
        $news41->setContent("
            Les sources de production d’électricité du Canada comptent déjà parmi les plus propres du monde. Actuellement, 66 % de notre électricité provient de sources renouvelables comme l’hydroélectricité, l’énergie éolienne et l’énergie solaire. Lorsque l’énergie nucléaire est prise en compte, plus de 80 % de notre électricité provient de sources qui sont bonnes pour la qualité de l’air et la lutte contre les changements climatiques.
        ");
        $news41->setTags($tagConso);
        $news41->setLink("https://www.canada.ca/fr/environnement-changement-climatique/services/gestion-pollution/production-energie/electricite.html");
        $news41->setAuthor("Gouvernement du Canada");

        // Consommation 6
        $news42 = new News();
        $news42->setName("L’électricité , ça pollue !");
        $news42->setContent("
            L’électricité pollue! Mais on ne va pas s’en passer, retourner vivre au 19e siècle et s’éclairer à la bougie, même si ça peut avoir un côté romantique.
            Donc oui, l’électricité, ça pollue. Enfin, c’est sa production qui pollue. C’est pourquoi il faut éviter de la gaspiller. Mais ça on en parlera une autre fois. En attendant, pour comprendre pourquoi ça pollue, il faut comprendre comment l’électricité est produite.
        ");
        $news42->setTags($tagConso);
        $news42->setLink("https://unpaspourlaplanete.com/lelectricite-ca-pollue/");
        $news42->setAuthor("Un Pas Pour La Planète");

        // Consommation 7
        $news43 = new News();
        $news43->setName("Quel pommeau de douche écologique choisir ?");
        $news43->setContent("
            Il existe de très nombreux pommeaux de douche dans le commerce. Mais la nouvelle tendance du moment, ce sont les pommeaux de douche écologiques. L'engouement autour de ce nouveau modèle ne cesse de prendre de l'ampleur. Nous avons sélectionné pour vous le top 5 des pommeaux de douche écologiques.
        ");
        $news43->setTags($tagConso);
        $news43->setLink("https://www.leparisien.fr/guide-shopping/maison/quel-pommeau-de-douche-ecologique-choisir-28-05-2019-8081598.php");
        $news43->setAuthor("Le Parisien");

        // Consommation 8
        $news44 = new News();
        $news44->setName("5 raisons pour prendre sa douche en 5 minutes");
        $news44->setContent("
            En prenant des douches plus courtes, vous faites des économies d'eau et d'énergie, mais pas seulement.
        ");
        $news44->setTags($tagConso);
        $news44->setLink("https://www.50five.fr/blog/douche-5-minutes-5-raisons.html");
        $news44->setAuthor("50 Five");

        // Consommation 9
        $news45 = new News();
        $news45->setName("La consommation moyenne en eau d’un foyer");
        $news45->setContent("
            Alors qu’à la fin du XVIIIe siècle, la consommation en eau était de 15 à 20 litres par personne et par jour, l’évolution économique et sociale, la modernisation et le changement dans les modes de vie ont très largement contribué à son augmentation. Il est aujourd’hui naturel d’ouvrir le robinet et de se servir en eau potable pour les différentes tâches du quotidien.
        ");
        $news45->setTags($tagConso);
        $news45->setLink("https://www.m-habitat.fr/plomberie-et-eau/consommation-d-eau/la-consommation-moyenne-en-eau-d-un-foyer-719_A");
        $news45->setAuthor("M Habitat");

        // Consommation 10
        $news46 = new News();
        $news46->setName("EAU POTABLE: COMMENT ÉVITER LE GASPILLAGE ?");
        $news46->setContent("
            100 litres. C’est l’écart de consommation d’eau entre une douche rapide et un bain. Ce simple geste quotidien permettrait d’économiser 100 litres d’eau par personne et par jour. L’économie représentée est énorme et ne concerne pourtant qu’une seule action. Il est facile de s’imaginer les économies supplémentaires réalisables si l’on changeait une dizaine d’autres habitudes.
        ");
        $news46->setTags($tagConso);
        $news46->setLink("https://eau-iledefrance.fr/eau-potable-comment-eviter-le-gaspillage/#:~:text=Ainsi%2C%20selon%20plusieurs%20%C3%A9tudes%2C%20on,de%20l'usage%20de%20sanitaires.");
        $news46->setAuthor("Eau IDF");

        // Consommation 11
        $news47 = new News();
        $news47->setName("Réussir son compost : mode d’emploi");
        $news47->setContent("
            Comment fait-on du compost avec un composteur ?
        ");
        $news47->setTags($tagConso);
        $news47->setLink("http://www.semoctom.com/web/fr/67-reussir-son-compost-mode-demploi.php");
        $news47->setAuthor("Semoctom");

        // Consommation 12
        $news48 = new News();
        $news48->setName("LE COMPOSTAGE");
        $news48->setContent("
            \"Rien ne se jette, tout se transforme ...\"
            Que faire des feuilles mortes, des tontes ? des épluchures de fruits et de légumes ?
            Du compost !
        ");
        $news48->setTags($tagConso);
        $news48->setLink("https://www.cc-terredeau.fr/fr/le-compostage.html");
        $news48->setAuthor("Terre d'eau");

        $this->em->persist($news37);
        $this->em->persist($news38);
        $this->em->persist($news39);
        $this->em->persist($news40);
        $this->em->persist($news41);
        $this->em->persist($news42);
        $this->em->persist($news43);
        $this->em->persist($news44);
        $this->em->persist($news45);
        $this->em->persist($news46);
        $this->em->persist($news47);
        $this->em->persist($news48);



        $tagNum = $repository->find(41);

        // Numérique 1
        $news49 = new News();
        $news49->setName("Le numérique est une ressource non renouvelable");
        $news49->setContent("
            Avec cette série de 3 articles, je souhaite vous amener à considérer le numérique comme une ressource critique, non renouvelable, en voie d’épuisement, et pour laquelle il est urgent de créer une articulation entre high et low tech numérique.
        ");
        $news49->setTags($tagNum);
        $news49->setLink("https://www.greenit.fr/2019/08/27/le-numerique-est-une-ressource-non-renouvelable/");
        $news49->setAuthor("Green IT");

        // Numérique 2
        $news50 = new News();
        $news50->setName("POLLUTION NUMÉRIQUE : QUEL IMPACT ENVIRONNEMENTAL ?");
        $news50->setContent("
            Cet article aborde l'impact environnemental d'un secteur numérique fort consommateur d'énergie. C'est ce que l'on appelle la pollution numérique (ou digitale). L'empreinte carbone du secteur numérique ne cesse de croître : via la fabrication d'appareils électroniques, la multiplication des usages et la gestion de la fin de leur fin de vie, le numérique participe à la pollution de l'environnement. Le concept d'écologie digitale, encore peu connu, permet de sensibiliser l'ensemble des acteurs économiques sur l'importance de la rationalisation des usages du numérique, afin de favoriser la transition écologique.
         ");
        $news50->setTags($tagNum);
        $news50->setLink("http://www.bsi-economics.org/992-pollution-numerique-impact-environnemental-ggg");
        $news50->setAuthor("BSI Economics");

        // Numérique 3
        $news51 = new News();
        $news51->setName("Recygo : la solution de recyclage papier au bureau");
        $news51->setContent("
            Triez et recyclez vos papiers de bureau en toute simplicité, à partir de 8,40€/mois par employés !
        ");
        $news51->setTags($tagNum);
        $news51->setLink("https://www.recygo.fr/l/devis-recyclage-papier?gclid=CjwKCAjwxev3BRBBEiwAiB_PWFKTGjT81UqgteP_u8YkclIuWfP5H8Ww6rHC03ELCqNUYnzP3j7s8xoCr4YQAvD_BwE");
        $news51->setAuthor("Recygo");

        // Numérique 4
        $news52 = new News();
        $news52->setName("LES DÉCHETS AU BUREAU, OÙ EN SOMMES-NOUS ? LES RÉSULTATS DE L’ÉTUDE MENÉE PAR RIPOSTE VERTE");
        $news52->setContent("
            Pour la 3ème édition de l'étude \"Quelle gestion des déchets au bureau\", Zero Waste France s'est associée à Riposte Verte pour informer sur les pratiques au bureau.
        ");
        $news52->setTags($tagNum);
        $news52->setLink("https://www.zerowastefrance.org/dechets-au-bureau-resultats-etude/");
        $news52->setAuthor("Zero Waste France");

        // Numérique 5
        $news53 = new News();
        $news53->setName("Le coût écologique faramineux du streaming vidéo");
        $news53->setContent("
            Selon un rapport de « The Shift Project », les vidéos en ligne représenteraient près de 1% des émissions de gaz à effet de serre à l'échelle mondiale. Un chiffre trop peu pris en compte d'après les membres de ce groupe de réflexion français, qui en appellent à la « sobriété numérique ».
        ");
        $news53->setTags($tagNum);
        $news53->setLink("https://www.lesechos.fr/tech-medias/medias/le-cout-ecologique-faramineux-du-streaming-video-1038436");
        $news53->setAuthor("Les Echos");

        // Numérique 6
        $news54 = new News();
        $news54->setName("Le streaming : un gouffre énergétique et une importante source d'émission de CO2");
        $news54->setContent("
            La dématérialisation des données nous permet maintenant de télécharger films, vidéos, jeux et musique sur notre smartphone ou ordinateur et d'en profiter quasi instantanément. Un confort qui se voudrait plus écologique que l'achat d'un support, et pourtant, le streaming, qui captera bientôt 80 % du trafic web mondial commence à peser lourd pour l'environnement.        
        ");
        $news54->setTags($tagNum);
        $news54->setLink("https://www.notre-planete.info/actualites/247-streaming-emissions-CO2");
        $news54->setAuthor("Notre Planète");

        // Numérique 7
        $news55 = new News();
        $news55->setName("Numérique et écologie : les data centers, des gouffres énergétiques ?");
        $news55->setContent("
            Quelle empreinte écologique pour l'informatique ? Le point sur les data centers (ou centres de données), qui ont gagné en efficience ces dernières années. Mais des pratiques comme le streaming ont un impact global considérable.
        ");
        $news55->setTags($tagNum);
        $news55->setLink("https://www.sciencesetavenir.fr/high-tech/informatique/numerique-et-ecologie-les-data-centers-des-gouffres-energetiques_121838");
        $news55->setAuthor("Sciences et Avenir");

        // Numérique 8
        $news56 = new News();
        $news56->setName("Comment réduire l’impact des Data Centers sur l’environnement");
        $news56->setContent("
            Les Data Centers représentent un véritable fléau pour l’environnement. Alors que la production et la consommation de données sont en passe d’exploser à l’échelle mondiale, découvrez quelles sont les pistes à explorer pour réduire la consommation d’énergie et l’impact environnemental des centres de données…
        ");
        $news56->setTags($tagNum);
        $news56->setLink("https://www.lebigdata.fr/data-centers-environnement");
        $news56->setAuthor("Le Big Data");

        // Numérique 9
        $news57 = new News();
        $news57->setName("Pollution numérique : comment réduire ses effets au quotidien ?");
        $news57->setContent("
            Le secteur informatique consomme environ 10% de l'électricité mondiale, selon un rapport de l’Agence de l’environnement et de la maîtrise de l’énergie (ADEME). C’est autant que l’avion. Si rien n’est fait, en 2025, le numérique polluera autant que le trafic automobile mondial. Dans un tel contexte, comment pouvons-nous réduire ce type de pollution ?
        ");
        $news57->setTags($tagNum);
        $news57->setLink("https://information.tv5monde.com/info/pollution-numerique-comment-reduire-ses-effets-au-quotidien-279020");
        $news57->setAuthor("TV 5 Monde");

        // Numérique 10
        $news58 = new News();
        $news58->setName("LIMITER L’IMPACT DES APPAREILS NUMÉRIQUES, PREMIER RESPONSABLE DE LA POLLUTION NUMÉRIQUE");
        $news58->setContent("
            Le Nokia 3310.
            Dans mon souvenir, LE premier portable « mainstream ».
            Que de révolutions depuis. Les smartphones, les tablettes, les écrans tactiles, le wifi, les applis, les montres et autres objets connectés et j’en passe.  L’ère de l’objet “intelligent”, toujours plus rapide, toujours plus puissant.
        ");
        $news58->setTags($tagNum);
        $news58->setLink("https://verdamano.com/pollution-numerique-limiter-le-lourd-impact-des-appareils-numeriques/");
        $news58->setAuthor("Verda Mano");

        // Numérique 11
        $news59 = new News();
        $news59->setName("Le saviez-vous ? Le terrible impact des smartphones sur l’environnement");
        $news59->setContent("
            Alors qu’il se vend près de 47 smartphones par seconde dans le monde, cette production n’est pas sans conséquence sur la planète…
        ");
        $news59->setTags($tagNum);
        $news59->setLink("https://www.jechange.fr/telecom/mobile/news/environnement-smartphone-11-04-2018-4394");
        $news59->setAuthor("Je change");

        // Numérique 12
        $news60 = new News();
        $news60->setName("L’impossible estimation de la pollution générée par son smartphone");
        $news60->setContent("
            L’évaluation de l’impact écologique du numérique est, pour la recherche, une équation aux inconnues multiples, rendue difficile par le manque de données disponibles.
        ");
        $news60->setTags($tagNum);
        $news60->setLink("https://www.lemonde.fr/planete/article/2019/09/28/l-impossible-estimation-de-la-pollution-generee-par-son-smartphone_6013390_3244.html");
        $news60->setAuthor("Le Monde");

        $this->em->persist($news49);
        $this->em->persist($news50);
        $this->em->persist($news51);
        $this->em->persist($news52);
        $this->em->persist($news53);
        $this->em->persist($news54);
        $this->em->persist($news55);
        $this->em->persist($news56);
        $this->em->persist($news57);
        $this->em->persist($news58);
        $this->em->persist($news59);
        $this->em->persist($news60);


        $this->em->flush();
        return Command::SUCCESS;

    }
}