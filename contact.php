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
    <body>
        <header >
            <nav>
                <a href="index.php">Accueil</a>
                <a href="roman.php">Roman</a>     
                <a id="connect" href="#">Connexion</a>
                <a id="inscription" href="#">Inscription</a>       
                <a href="contact.php">Contact</a> 
            </nav>
           
            <video id="video" loop autoplay muted src="video/aircraft - 7180.mp4"></video>
            <div id="contenu">
                <h2 class="titre-contact">Contact</h2>
                <div id="envoi">
                <h2>Votre message a été envoyé !</h2>
                <i class="far fa-check-circle"></i>
            </div>
                <button class="contact">Contactez-moi !</button>
            </div>
            <div class="pattern"></div>
            <button id="pause"><i class="far fa-pause-circle fa-3x"></i></button>
         
                <input class="search" type="text" name="search" placeholder="Recherche..">
          

            <form id="formulaire" action="">
                <input class="nom" type="text" placeholder="Votre Nom">
                <input class="prenom" type="text" placeholder="Votre Prénom">
                <input class="mail" type="text" placeholder="Votre adresse mail">
                <textarea class="message" placeholder="Votre Message" name="" id="" cols="30" rows="3"></textarea>
            </form>
            <button class="submit" type="submit" value="submit"><i class="fa fa-paper-plane" id="formulaire"></i>Envoyer !</button>
            <div class="pop-inscription">
                    <img class="cross" src="img/cross.svg" alt="croix">  
                    <h3 >Inscrivez-vous !</h3>
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
                    <h3 >Connectez-vous !</h3>
                <form action="">
                    <input type="email" placeholder="Identifiant">
                    <input type="text" placeholder="Mot de Passe">
                </form>
                    <button class="btn-submit" type="submit">Connexion</button>
            </div>
            <div class="pop-contact">
                <img class="cross" src="img/cross.svg" alt="croix">
                <h3>Contactez-moi !</h3>
                <h4>Je vous réponds rapidement !</h4>
                <form action="">
                    <input type="text" placeholder="Votre Prénom">
                    <input type="text" placeholder="Votre Nom">
                    <input type="email" placeholder="Votre e-mail">
                    <textarea name="" id="" cols="20" rows="2" placeholder="Votre message"></textarea>
                </form>
                <button class="btn-submit" type="submit">Envoyer</button>
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
        <section id="find">
            <h2>Me Trouver</h2>
        <div id="map"></div>
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