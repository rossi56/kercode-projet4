<?php 
 $video = 'public/video/snow.mp4';
 $title = "Billet simple pour l'Alaska";
 $image = '';
 include 'views/header.php';

 ?>

    <main>
        <section id='split'>
            <article class="blog">
                <h2>Blog</h2>
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
    </main>
    
<?php include 'views/footer.php' ?>