<?php
require_once ('models/ArticlesManager.php');
require_once ('models/CommentsManager.php');


class ArticlesController
{
    //AFFICHAGE DE PLUSIEURS ARTICLES
    public function articles()
    {
        $articlesManager = new ArticlesManager;
        $articles = $articlesManager->getArticles();
        require('views/articlesView.php');
    }

    
    //AFFICHAGE D'UN SEUL ARTICLE
    public function article($id)
    {
        $articlesManager = new ArticlesManager;
        $article = $articlesManager->getArticle($id);
        $commentsManager = new CommentsManager;
        $commentaires = $commentsManager->getComments($id);
        $nb_commentaires = $commentsManager->getnbComments($id);
        $search = $articlesManager->recherche();
        require('views/articleView.php');
    } 

    public function search()
    {
        $articlesManager = new ArticlesManager;
        $recherche = $articlesManager->recherche();
        require('views/articleView.php'); 
    }

    public function usercomment()
    {
        $commentsManager = new CommentsManager;
        $usercomment = $commentsManager->commentaires_user();
        require('views/articleView.php');
    }
}