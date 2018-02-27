<!DOCTYPE php>
<php lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Billet simple pour l'Alaska</title>
</head>

<body>
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
                <img class="pref-img" src="img/book.png" alt="Préface">
                <div class="pattern"></div>
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
        
            <article class="preface">
                <h2>Préface</h2>
                <img src="img/falaise.png" alt="Falaise">
                <p>Vous me direz, POURQUOI ? Et là je vous répondrai…. Pourquoi pas ?......... <br> Pourquoi ne pas sortir des sentiers
                    battus, pourquoi être sans cesse à la recherche d’un éditeur, pourquoi être à la recherche de gloire,
                    de succès. <br> Moi je n’en suis pas là et je vais vous l’expliquer au travers de ces quelques lignes de préface. <br>
                    Je suis amoureux, amoureux de la vie, de la terre, de tout ce qui m’entoure.<br> Je me qualifierai de contemplatif,
                    j’aime apprendre en observant dans le silence, seul, avec pour seul bruit le murmure de la nature.<br> Du
                    vent qui fait frémir les feuilles des arbres dans ce petit bruissement si caractéristique, du petit oiseau
                    cherchant à communiquer avec ses congénères. <br>Voilà ce que j’aimerai vous faire partager. Pourquoi alors
                    le faire au travers d’un blog et non d’un livre ?<br> Je ne dis pas que je n’éditerai pas ce livre en version
                    papier, bien au contraire ; mais je veux de l’interactivité avec mes lecteurs.<br> J’aimerai avoir des retours
                    tout au long de mes écrits et de mes publications, une participation solidaire à l’écriture de mon roman.<br>
                    Je peux également me qualifier d’écrivain des temps modernes, me servant des outils numériques ; mais
                    également amoureux de la langue française et très attaché à ses valeurs.<br> Alors pourquoi ne pas allier
                    les deux ?<br> Suivez-moi, inscrivez-vous, connectez-vous et partageons.<br> Partageons ensemble ce récit. A
                    tout de suite……………
                </p>
            </article>
        <div class="bg1"></div>
    </section>
    <footer>
            <div id="adress">
                Jean Forteroche <br>4050 University Lake Dr, <br> Anchorage, <br> AK 99508-4600 <br> Etats Unis
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
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQfpft0MIiwF4INGm3uMGrylY7OqBujG4 &callback=initMap">
</script>
<script src="js/map.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/script.js"></script>
<script src="js/split.js"></script>

</body>

</php>