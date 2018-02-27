<?php
    $articles = [
        [
            "id" => 1,
            "titre" => "Article 1",
            "extrait" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            "publication" => "2018-02-27 11:00 ",
            "image"=> "img/article-1.png"
        ],
        [
            "id" => 2,
            "titre" => "Article 2",
            "extrait" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            "publication" => "2018-02-27 11:02 ",
            "image"=> "img/article-1.png"
        ],
        [
            "id" => 3,
            "titre" => "Article 3",
            "extrait" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            "publication" => "2018-02-27 11:03 ",
            "image"=> "img/article-1.png"
        ],
        [
            "id" => 4,
            "titre" => "Article 4",
            "extrait" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            "publication" => "2018-02-27 11:04 ",
            "image"=> "img/article-1.png"
        ],
        [
            "id" => 5,
            "titre" => "Article 5",
            "extrait" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            "publication" => "2018-02-27 11:05 ",
            "image"=> "img/article-1.png"
        ],
        [
            "id" => 6,
            "titre" => "Article 6",
            "extrait" => "Lorem ipsum dolor sit amet consectetur adipisicing elit.",
            "publication" => "2018-02-27 11:06 ",
            "image"=> "img/article-1.png"
        ],
    ]
?>




<!DOCTYPE php>
<php lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Billet simple pour l'Alaska</title>
</head>

<body id="index">
    <header>
        <h1>Billet simple pour l'Alaska</h1>
        <p>"Le projet un peu fou d'un écrivain voyageur"</p>
        <form>
            <input class="search" type="text" name="search" placeholder="Recherche..">
        </form>
        <p id="by">
            <span> By</span> Jean Forteroche</p>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="roman.php">Roman</a>
            <a id="connect" href="#">Connexion</a>
            <a id="inscription" href="#">Inscription</a>
            <a href="contact.php">Contact</a>
        </nav>
        <video id="video" autoplay loop src="video/lettres.mp4"></video>
        <div class="pattern"></div>
        <button id="pause"><i class="far fa-pause-circle fa-3x"></i></button>
        <div class="pop-inscription">
            <img class="cross" src="img/cross.svg" alt="croix">
            <h3>Inscrivez-vous !</h3>
            <h4>Ne rater pas les derniers articles !</h4>
            <form action="">
                <input type="text" placeholder="Votre Prénom">
                <input type="text" placeholder="Votre Nom">
                <input type="email" placeholder="Votre e-mail">
                <input type="text" placeholder="Mot de Passe">
            </form>
            <button class="btn-submit" type="submit">S'inscrire</button>
        </div>
        <div class="pop-connect">
            <img class="cross" src="img/cross.svg" alt="croix">
            <h3>Connectez-vous !</h3>
            <form action="">
                <input type="email" placeholder="Identifiant">
                <input type="text" placeholder="Mot de Passe">
            </form>
            <button class="btn-submit" type="submit">Connexion</button>
        </div>
        <div class="burger">
            <svg width="100px" height="100px">
                <path class="top" d="M 30 40 L 70 40 C 90 40 90 75 60 85 A 40 40 0 0 1 20 20 L 80 80"></path>
                <path class="middle" d="M 30 50 L 70 50"></path>
                <path class="bottom" d="M 70 60 L 30 60 C 10 60 10 20 40 15 A 40 38 0 1 1 20 80 L 80 20"></path>
            </svg>
        </div>
        <div class="mask"></div>
    </header>
    <section class="container">
            <article>
                <figure>
                    <img src="<?= $articles[0] ["image"]; ?>" alt="<?= $articles[0] ["image"]; ?>">
                    <figcaption>
                        <h3><?= $articles[0] ["titre"]; ?></h3>
                        <p class="date"><time datetime="<?= $articles[0] ["publication"]; ?>"><?= $articles[0] ["publication"]; ?> </time></p>
                        <p class="extrait"><?= $articles[0] ["extrait"]; ?>
                        </p>
                    </figcaption>
                    <a href="article.php?id=<?=$articles[0] ["id"];  ?>"></a>
                    <div class="pattern-2"></div>
                </figure>
            </article>
            <article>
                <figure>
                    <img src="<?= $articles[1] ["image"]; ?>" alt="<?= $articles[1] ["image"]; ?>">
                    <figcaption>
                        <h3><?= $articles[1] ["titre"]; ?></h3>
                        <p class="date"><time datetime="<?= $articles[1] ["publication"]; ?>"><?= $articles[1] ["publication"]; ?> </time></p>
                        <p class="extrait"><?= $articles[1] ["extrait"]; ?>
                        </p>
                    </figcaption>
                    <a href="article.php?id=<?=$articles[1] ["id"];  ?>"></a>
                    <div class="pattern-2"></div>
                </figure>
            </article>
            <article>
                <figure>
                    <img src="<?= $articles[2] ["image"]; ?>" alt="<?= $articles[2] ["image"]; ?>">
                    <figcaption>
                        <h3><?= $articles[2] ["titre"]; ?></h3>
                        <p class="date"><time datetime="<?= $articles[2] ["publication"]; ?>"><?= $articles[2] ["publication"]; ?> </time></p>
                        <p class="extrait"><?= $articles[2] ["extrait"]; ?>
                        </p>
                    </figcaption>
                    <a href="article.php?id=<?=$articles[2] ["id"];  ?>"></a>
                    <div class="pattern-2"></div>
                </figure>
            </article>
            <article>
                <figure>
                    <img src="<?= $articles[3] ["image"]; ?>" alt="<?= $articles[3] ["image"]; ?>">
                    <figcaption>
                        <h3><?= $articles[3] ["titre"]; ?></h3>
                        <p class="date"><time datetime="<?= $articles[3] ["publication"]; ?>"><?= $articles[3] ["publication"]; ?> </time></p>
                        <p class="extrait"><?= $articles[3] ["extrait"]; ?>
                        </p>
                    </figcaption>
                    <a href="article.php?id=<?=$articles[3] ["id"];  ?>"></a>
                    <div class="pattern-2"></div>
                </figure>
            </article>
            <article>
                <figure>
                    <img src="<?= $articles[4] ["image"]; ?>" alt="<?= $articles[4] ["image"]; ?>">
                    <figcaption>
                        <h3><?= $articles[4] ["titre"]; ?></h3>
                        <p class="date"><time datetime="<?= $articles[4] ["publication"]; ?>"><?= $articles[4] ["publication"]; ?> </time></p>
                        <p class="extrait"><?= $articles[4] ["extrait"]; ?>
                        </p>
                    </figcaption>
                    <a href="article.php?id=<?=$articles[4] ["id"];  ?>"></a>
                    <div class="pattern-2"></div>
                </figure>
            </article>
            <article>
                <figure>
                    <img src="<?= $articles[5] ["image"]; ?>" alt="<?= $articles[5] ["image"]; ?>">
                    <figcaption>
                        <h3><?= $articles[5] ["titre"]; ?></h3>
                        <p class="date"><time datetime="<?= $articles[5] ["publication"]; ?>"><?= $articles[5] ["publication"]; ?> </time></p>
                        <p class="extrait"><?= $articles[5] ["extrait"]; ?>
                        </p>
                    </figcaption>
                    <a href="article.php?id=<?=$articles[5] ["id"];  ?>"></a>
                    <div class="pattern-2"></div>
                </figure>
            </article>
            
        <div class="bg"></div>
    </section>
    <footer>
        <div id="adress">
            Jean Forteroche
            <br>4050 University Lake Dr,
            <br> Anchorage,
            <br> AK 99508-4600
            <br> Etats Unis
        </div>
        <p id="copy">Copyright Kercode 2018 - Site réalisé à des fins pédagogiques</p>
        <ul id="reseaux">
            <a href="#" id="fb"></a>
            <a href="#" id="tw"></a>
            <a href="#" id="lk"></a>
            <a href="#" id="inst"></a>
        </ul>
    </footer>
    </main>

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQfpft0MIiwF4INGm3uMGrylY7OqBujG4 &callback=initMap">
    </script>
    <script src="js/map.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/split.js"></script>

</body>

</php>