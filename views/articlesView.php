<?php
$title = "Billet simple pour l'Alaska";
$video = "public/video/chapitre.mp4";
$image = "public/img/header/chapitres.png";
?>
<?php ob_start() ?>
<?php
    if(count($articles) > 0) :
    if(isset($_POST["query"])) : //affichage du résultat de recherche s'il y a un résultat
?>
    <h3 class="recherche">Voici le résultat de votre recherche avec "<?= $_POST["query"] ?>"</h3>
<?php
    endif;             
    foreach($articles as $article) ://boucle d'affichage des articles
?>
    <article class="roman">
        <figure>
            <img src="public/img/presentation/<?= $article["img"]; ?>" alt="<?= $article["img"]; ?>">
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
    else :
?>
    <p class="recherche">Aucun résultat pour votre recherche</p>
<?php
    endif;
?>
<?php $content = ob_get_clean(); ?>
<?php require('templates/template.php'); ?>

                        


                        