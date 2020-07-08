# Humans x Earth

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)


## Sommaire

- [Lien](#lien)
- [Choix Technique](#technical)
- [Explications](#explain)
- [Modèle Physique des Données](#mpd)
- [API](#route)





##<a name="link"></a> Lien

[Heroku](https://radiant-anchorage-47441.herokuapp.com/)

##<a name="technical"></a> Choix technique

### Serveur

Apache2

### SGBD

ClearDB MYSQL (Heroku) / MySQL

### Liste des composants

- Doctrine
- Serializer
- DotEnv
- HttpFoundation
- Security


##<a name="explain"></a> Explications

### 1) Heroku

Mon choix s'est porté sur Heroku, par sa simplicité d'installation, en plus
d'avoir d'une interface simpliste et facile d'utilisation.

Cela m'a permis de gérer mon projet à l'aide du CLI comme de l'interface WEB.

De plus, le service proposé par Heroku est gratuit.

### 2) Serveur

J'ai choisi d'utiliser Apache, pour la documentation présente sur Heroku.
J'ai donc crée mon .HTACCESS, ainsi que mon Procfile autour de celui-ci.


###<a name="mpd"></a> 3) Modèle Physique des Données

![alt text](https://zupimages.net/up/20/28/uc09.png)

### 4) Partie Back-End

J'ai démarré le Back-End par un MPD, afin de pouvoir créer mes entitées directement.

J'ai ensuite créer un Controller afin d'y insérer mes données d'essaies.

Une fois l'hébergeur trouvé, donc dans mon cas Heroku, j'ai inséré de vrai datas et liés entre elles.

J'ai donc crée par la suite un nouveau Controller pour envoyer du JSON.

**La suite :**

J'aimerais remplacer le Controller insérant les datas par des [[Commandes](https://symfony.com/doc/current/console.html)] 



##<a name="route"></a> Les routes de l'API (Exemple)

[[Register](https://radiant-anchorage-47441.herokuapp.com/json/register)] Method: POST

**Datas:** "email" / "password" / "name"

```json
{
    "success"           : "yes",
    "id"                : 41,
    "email"             : "admin3@gmail.com",
    "password"          : "betatester",
    "name"              : "Test admin",
    "created_at"        : {
        "date"          : "2020-07-07 22:06:06.817863",
        "timezone_type" : 3,
        "timezone"      : "UTC"
    }
}
```

[[Login](https://radiant-anchorage-47441.herokuapp.com/json/login)] Method: POST

**Datas:** "email" / "password"

```json
{
    "success"           : "yes",
    "id"                : 41,
    "email"             : "admin3@gmail.com",
    "password"          : "betatester",
    "name"              : "Test admin",
    "created_at"        : {
        "date"          : "2020-07-07 22:06:06.817863",
        "timezone_type" : 3,
        "timezone"      : "UTC"
    }
}
```

[[Challenge](https://radiant-anchorage-47441.herokuapp.com/json/challenge)] Method: GET

```json
{
  "id"     : 1,
  "content": "Vous avez soif ?",
  "toKnow" : "L’eau vendue en bouteille génère 10 à 20 millions de m3 de déchets par an.",
  "step"   : {
    "id"   : 91,
    "name" : "La soif"
  },
  "tips": [
    {
      "id"     : 271,
      "content": "Boire l'eau du robinet plutôt que l'eau en bouteille"
    },
    {
      "id"     : 281,
      "content": "Acheter une gourde réutilisable (inox de préférence)"
    },
    {
      "id"      : 291,
      "content": "Vittel à lancé la première bouteille d’eau 75cl fabriquée avec 100% de plastique recyclé"
    }
  ],
  "news": [
    {
      "id"      : 781,
      "name"    : "Eau en bouteille ou du robinet: le match en chiffres",
      "content" : " Les Français boivent-ils beaucoup d'eau en bouteilles? Combien coûte-t-elle par rapport à l'eau du robinet? Est-elle meilleure pour la santé? Cette industrie est-elle polluante? Des chiffres, des réponses. ",
      "link"    : "https://www.lexpress.fr/actualite/societe/environnement/eau-en-bouteille-ou-du-robinet-le-match-en-chiffres_859054.html",
      "author"  : "L'Express"
    },
    {
      "id"      : 791,
      "name"    : "Comment limiter sa consommation d’emballages",
      "content" : " Chaque année, 90 milliards d’emballages passent entre les mains des Français ! Ils constituent désormais le volume le plus important du contenu des poubelles et finissent encore majoritairement dans une décharge ou un incinérateur. Pour enrayer ce fléau, le tri ne suffit pas. Il faut réduire les déchets d’emballage à la source. ",
      "link"    : "https://www.quechoisir.org/conseils-dechets-comment-limiter-sa-consommation-d-emballages-n9821/#:~:text=%C3%A0%20verser%20dans%20un%20flacon,3%20de%20d%C3%A9chets%20par%20an.",
      "author"  : "Que Choisir"
    }
  ]
}
```

[[Tags & Steps](https://radiant-anchorage-47441.herokuapp.com/json/stepandtag)] Method: GET


```json
{
  "id":1,
  "name":"La plage",
  "tag": {
    "id":1,
    "name":"Déchets"
  }
}
```