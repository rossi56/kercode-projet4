<?php
$title = "Billet simple pour l'Alaska";
$video = "public/video/lettres.mp4";
$image = ''
?>


<?php ob_start(); ?>

                <?php
                    if(isset($_POST["query"])) : //affichage du résultat de recherche s'il y a un résultat
                ?>
                    <p>Voici le résultat de votre recherche avec "<?= $_POST["query"] ?>"</p>
                <?php
                    endif;
                ?>
                <?php
                foreach($articles as $article) ://boucle d'affichage des articles
                 ?>
                    <article>
                        <figure>
                            <img src="public/img/<?= $article["img"]; ?>" alt="<?= $article["img"]; ?>">
                            <figcaption>
                                <h3>
                                    <?= $article["titre"]; ?>
                                </h3>
                                <p class="date">Posté le
                                    <time datetime="<?= $article["publication"] ?>">
                                        <?= $article["publication"] ?>
                                    </time>
                                </p>
                                <p class="extrait">
                                    <?= $article["extrait"]; ?>
                                </p>
                            </figcaption>
                            <a href="index.php?action=article&id=<?= $article["id"];  ?>"></a>
                            <div class="pattern-2"></div>
                        </figure>
                    </article>
                <?php
                 endforeach;
                ?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>

                        