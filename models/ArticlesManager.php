<?php
require_once ('models/Model.php');
class ArticlesManager extends Model
{

    //AFFICHAGE DE PLUSIEURS ARTICLES
    public function getArticles()
    {
        $bdd = $this->getBdd();

        $articles = $bdd->query("SELECT id, titre, extrait, publication, img, imageArt FROM articles ORDER BY id DESC");
        $articles = $articles->fetchAll();
        return $articles;
    }
    //AFFICHAGE D'UN SEUL ARTICLE
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

      /*Fonction recherche */

    public  function recherche()
    {
        $bdd =$this->getBdd();

        extract($_POST);
        $recherche = $bdd->prepare("SELECT id, titre, extrait, publication, img, imageArt FROM articles WHERE titre LIKE :query OR contenu LIKE :query ORDER BY id DESC");
        $recherche->execute([
            "query" => '%' . $query . '%' //il peut y avoir du contenu avant ou après le terme de recherche
        ]);
        $recherche = $recherche->fetchAll();
        return $recherche;
    }

}