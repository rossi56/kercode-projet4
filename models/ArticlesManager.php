<?php
require_once ('models/Model.php');

/**
 * Gestion des articles
 */
class ArticlesManager extends Model
{

    /**
     * AFFICHAGE DE PLUSIEURS ARTICLES
     *
     * @return void
     */
    public function getArticles()
    {
        $bdd = $this->getBdd();

        $articles = $bdd->query("SELECT id, titre, extrait, publication, img, imageArt FROM articles ORDER BY id DESC");
        $articles = $articles->fetchAll();
        return $articles;
    }


    /**
     * AFFICHAGE D'UN SEUL ARTICLE
     *
     * @param [type] $id
     * @return void
     */
    public function getArticle($id)
    {
        $bdd = $this->getBdd();

    /*Sécurisation id de l'url, faille de sécurité*/
    $article = $bdd->prepare("SELECT id, titre, contenu, publication, img, imageArt FROM articles WHERE id = ?");
    $article->execute([$id]);
    $article = $article->fetch();

    if(empty($article))
    header("Location: index.php");//redirection vers page d'accueil si la variable article est vide
    else
    return $article;
    }

    /**
     * Fonction pour la barre de recherche
     *
     * @param [type] $query
     * @return void
     */
    public  function recherche($query)
    {
        $bdd =$this->getBdd();
        $recherche = $bdd->prepare("SELECT id, titre, extrait, publication, img, imageArt FROM articles WHERE titre LIKE :query OR contenu LIKE :query ORDER BY id DESC");
        $recherche->execute([
            "query" => '%' . $query . '%' //il peut y avoir du contenu avant ou après le terme de recherche
        ]);
        $recherche = $recherche->fetchAll();
        return $recherche;
    }

   

    /**
     * Fonction commenter Article
     *
     * @param [type] $id_membre
     * @param [type] $id_article
     * @param [type] $commentaire
     * @return void
     */
    public function commenter($id_membre, $id_article, $commentaire ) {
        if(isset($_SESSION["membre"])) {
            $bdd =$this->getBdd();
        
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
                
            }
            else
                $erreur .= "Vous devez écrire du texte !";
            
            return $erreur;
            
            }
        }

}