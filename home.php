<?php session_start();
 $video = 'public/video/billet.mp4';
 $video2 = 'public/video/Jean.mp4';
 $title = "Billet simple pour l'Alaska";
 $image =  'public/img/header/titre.png';
 ?>
<!DOCTYPE html>
    <html lang="fr">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="public/css/main.css">
            <link rel="apple-touch-icon" sizes="57x57" href="public/img/favicon/apple-icon-57x57.png">
            <link rel="apple-touch-icon" sizes="60x60" href="public/img/favicon/apple-icon-60x60.png">
            <link rel="apple-touch-icon" sizes="72x72" href="public/img/favicon/apple-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="76x76" href="public/img/favicon/apple-icon-76x76.png">
            <link rel="apple-touch-icon" sizes="114x114" href="public/img/favicon/apple-icon-114x114.png">
            <link rel="apple-touch-icon" sizes="120x120" href="public/img/favicon/apple-icon-120x120.png">
            <link rel="apple-touch-icon" sizes="144x144" href="public/img/favicon/apple-icon-144x144.png">
            <link rel="apple-touch-icon" sizes="152x152" href="public/img/favicon/apple-icon-152x152.png">
            <link rel="apple-touch-icon" sizes="180x180" href="public/img/favicon/apple-icon-180x180.png">
            <link rel="icon" type="image/png" sizes="192x192"  href="public/img/favicon/android-icon-192x192.png">
            <link rel="icon" type="image/png" sizes="32x32" href="public/img/favicon/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="96x96" href="public/img/favicon/favicon-96x96.png">
            <link rel="icon" type="image/png" sizes="16x16" href="public/img/favicon/favicon-16x16.png">
            <link rel="manifest" href="public/img/favicon/manifest.json">
            <meta name="msapplication-TileColor" content="#ffffff">
            <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
            <meta name="theme-color" content="#ffffff">
            <title><?= $title ?></title>
        </head>

        <body>
            <header>
                <p>"Le projet un peu fou d'un écrivain voyageur"</p>
<?php 
    include 'views/navigationView.php';
?>
                <video id="video" autoplay loop src="public/video/home.mp4"></video>
                <img class="pref-img" src= "<?= $image?>">
                <div class="pattern"></div>

                <button id="pause">
                    <i class="far fa-pause-circle fa-3x"></i>
                </button>
                
                <div class="burger">
                    <svg width="100px" height="100px">
                        <path class="top" d="M 30 40 L 70 40 C 90 40 90 75 60 85 A 40 40 0 0 1 20 20 L 80 80"></path>
                        <path class="middle" d="M 30 50 L 70 50"></path>
                        <path class="bottom" d="M 70 60 L 30 60 C 10 60 10 20 40 15 A 40 38 0 1 1 20 80 L 80 20"></path>
                    </svg>
                </div>
                <div class="mask"></div>
            </header>
    <main>
        <section class="mobile">
        <h1>Billet simple pour l'Alaska</h1>
                <p>"Les plus belles histoires commencent
                    <br> toujours par un naufrage"
                    <br>
                    <span>Jack London</span>
                </p>
               
                <figure class="portrait">
                    <img src="public/img/portrait.png" alt="Portrait">
                </figure>
                <p class="text">
                    <strong>Jean Forteroche.....</strong>c'est moi! Aventurier avant de devenir écrivain, les grands espaces m'ont
                    toujours inspirés.
                    <br> L'aventure et l'écriture, deux mots qui résonnent à mon oreille. Leur murmure est une ode à l'escapade
                    et à la flânerie.
                    <br> Mon esprit vagabonde vers de nouveaux espaces que je vais vous faire découvrir par mes écrits.
                    <br> Cette idée un peu folle, mais qui me ressemble tant; de vous faire découvrir les endroits vers lesquels
                    mes rêves me portent; au travers de ce blog mis à jour au fur et à mesure de la rédaction de mon roman.
                    <br> Je vous souhaite une lecture des plus distrayante. Je reste à votre disposition pour communiquer au
                    travers de ce blog, alors n'hésitez pas.....
                    <br>
                    <span>Je vous attends!</span>
                    <a class='btn-mobil' href="index.php?action=articles">Entrez</a>
                </p>
        </section>
        <section id='split'>
            <article class="blog">
                <h1>Billet simple pour l'Alaska</h1>
                <p>"Les plus belles histoires commencent
                    <br> toujours par un naufrage"
                    <br>
                    <span>Jack London</span>
                </p>
                <figure class="book">
                    <img src="public/img/blog.png" alt="Book">
                </figure>
                <img id="punaise2" src="public/img/punaise.png" alt="Punaise-2">
                <a class="enter" href="index.php?action=articles">Entrez !</a>
            </article>
            <article class="about">
                <h2 class="projet">Le Projet</h2>
                <h3>"Qui suis-je ?"</h3>
                <figure class="portrait">
                    <img src="public/img/portrait.png" alt="Portrait">
                </figure>
                <img id="punaise" src="public/img/punaise.png" alt="Punaise">
                <p class="text">
                    <strong>Jean Forteroche.....</strong>c'est moi! Aventurier avant de devenir écrivain, les grands espaces m'ont
                    toujours inspirés.
                    <br> L'aventure et l'écriture, deux mots qui résonnent à mon oreille. Leur murmure est une ode à l'escapade
                    et à la flânerie.
                    <br> Mon esprit vagabonde vers de nouveaux espaces que je vais vous faire découvrir par mes écrits.
                    <br> Cette idée un peu folle, mais qui me ressemble tant; de vous faire découvrir les endroits vers lesquels
                    mes rêves me portent; au travers de ce blog mis à jour au fur et à mesure de la rédaction de mon roman.
                    <br> Je vous souhaite une lecture des plus distrayante. Je reste à votre disposition pour communiquer au
                    travers de ce blog, alors n'hésitez pas.....
                    <br>
                    <span>Je vous attends!</span>
                </p>

            </article>
            
        </section>
        <div class="scrollTop">
              <i class="fas fa-angle-double-up "></i>
            </div>
    </main>
    
<?php include 'views/footer.php' ?>