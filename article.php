<?php

require('models/model.php');


if (isset($_GET['id']) && $_GET['id'] > 0) {

    $article = getArticle($_GET['id']);

    $commentaires = getComments($_GET['id']);

    $nb_commentaires = getnbComments($_GET['id']);

    require('views/articleView.php');

}

else {

    echo 'Erreur : aucun identifiant de billet envoyé';

}