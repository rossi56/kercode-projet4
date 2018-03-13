<?php

        function bdd(){
            try {
                $bdd = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
                $bdd->exec("SET CHARACTER SET utf8");//encodage UTF8
            } catch (PDOException $e) {
                echo 'La connexion a échouée : ' . $e->getMessage();
            }
            return $bdd;
        }

        
     /*Fonction récupération articles*/
        function getArticles(){
            $bdd = bdd();

            $articles = $bdd->query("SELECT id, titre, extrait, publication, img, imageArt FROM articles ORDER BY id DESC");
            $articles = $articles->fetchAll();
            return $articles;
        }

        function getArticle($id){
            $bdd = bdd();

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

        /*   Gestion des commentaires             */
     function getComments($id_article){
        $bdd = bdd();

        $id_article = (int)$_GET["id"];
        $commentaires = $bdd->prepare("SELECT commentaires.*, membres.pseudo, membres.avatar FROM commentaires INNER JOIN membres ON commentaires.id_membre = membres.id AND commentaires.id_article = ?");
        $commentaires->execute([$id_article]);
        $commentaires = $commentaires->fetchAll();


        return $commentaires;

    }

       /*Gestion du nombre de commentaires*/
    
     function getnbComments() {
        $bdd = bdd();
        $id_article = (int)$_GET["id"];;

        $nb_commentaires = $bdd->prepare("SELECT COUNT(*) FROM commentaires WHERE id_article = ?");
        $nb_commentaires->execute([$id_article]);
        $nb_commentaires = $nb_commentaires->fetch()[0];
        return $nb_commentaires;
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

      /*Fonction recherche */

      function recherche(){
        $bdd = bdd();

        extract($_POST);
        $recherche = $bdd->prepare("SELECT id, titre, extrait, publication, img, imageArt FROM articles WHERE titre LIKE :query OR contenu LIKE :query ORDER BY id DESC");
        $recherche->execute([
            "query" => '%' . $query . '%' //il peut y avoir du contenu avant ou après le terme de recherche
        ]);
        $recherche = $recherche->fetchAll();
        return $recherche;
    }

    // FONCTION COMMENTAIRES UTILISATEUR

     function commentaires_user(){
        $bdd = bdd();

    $commentaires = $bdd->prepare("SELECT commentaires.*, articles.titre FROM commentaires INNER JOIN articles ON commentaires.id_article = articles.id AND commentaires.id_membre = ? ");
    $commentaires->execute([$_SESSION["membre"]]);
    $commentaires = $commentaires->fetchAll();

    return $commentaires;

}

//Laisser un commentaire dans les articles

     function commenter() {
    if(isset($_SESSION["membre"])) {
        $bdd = bdd();
    
        $erreur = "";

        extract($_POST);

        if(!empty($commentaire)) {
            $id_article = (int)$_GET["id"];//On vérifie l'intégrité de id_article
            
            $commenter = $bdd->prepare("INSERT INTO commentaires(id_membre, id_article, commentaire) VALUES(:id_membre, :id_article, :commentaire)");
            $commenter->execute([
                "id_membre" => $_SESSION["membre"],
                "id_article" => $id_article,
                "commentaire" => nl2br(htmlentities($commentaire))
                
            ]);
            header("Location: article.php?id=" . $id_article);
        }
        else
            $erreur .= "Vous devez écrire du texte !";
        
        return $erreur;
        
    }
   

}



        









