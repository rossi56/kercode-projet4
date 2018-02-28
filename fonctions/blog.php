<?php
/*Fonction récupération articles*/
    function articles(){
        global $bdd;
        $articles = $bdd->query("SELECT id, titre, extrait, publication, img, imageArt FROM articles ORDER BY id DESC ");
        $articles = $articles = $articles->fetchAll();
        return $articles;
    }
/*Formatage de la date de publication*/
    function formatage_date($publication){
        $publication = explode(" ", $publication);
        $date = explode("-", $publication[0]);
        $heure = explode(":",$publication[1]);
        $mois = ["", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
        $resultat = $date[2] . ' ' . $mois[(int)$date[1]] . ' ' . $date[0] . ' à ' . $heure[0] . ' h ' . $heure [1];
        return $resultat;
    }

/*Récupération d'un article unique*/

    function article($id){
        global $bdd;
        /*Sécurisation id de l'url, faille de sécurité*/
        $id=(int)$_GET["id"];//conversion obligatoire en entier avec (int)
        $article = $bdd->prepare("SELECT id, titre, contenu, publication, img, imageArt FROM articles WHERE id = ?");
        $article->execute([$id]);
        $article = $article->fetch();

        if(empty($article))
        header("Location: index.php");//redirection vers page d'accueil si la variable article est vide
        else
            return $article;
    }


    /*Gestion du nombre de commentaires*/
    
    function nb_commentaires($id_article) {
        global $bdd;
        $id_article = (int)$id_article;

        $nb_commentaires = $bdd->prepare("SELECT COUNT(*) FROM commentaires WHERE id_article = ?");
        $nb_commentaires->execute([$id_article]);
        $nb_commentaires = $nb_commentaires->fetch()[0];
        return $nb_commentaires;
    }
/*   Gestion des commentaires             */
    function commentaires($id_article){
        global $bdd;

        $id_article = (int)$id_article;
        $commentaires = $bdd->prepare("SELECT commentaires.*, membres.pseudo FROM commentaires INNER JOIN membres ON commentaires.id_membre = membres.id AND commentaires.id_article = ?");
        $commentaires->execute([$id_article]);
        $commentaires = $commentaires->fetchAll();


        return $commentaires;

    }