<?php

require('controllers/controller.php');


if (isset($_GET['action'])) {

    if ($_GET['action'] == 'articles') {

        articles();

    }

    elseif ($_GET['action'] == 'article') {

        if (isset($_GET['id']) && $_GET['id'] > 0) {

            article();

        }

        else {

            echo 'Erreur : aucun identifiant de billet envoyé';

        }

    }

}

else {

   articles();

}

