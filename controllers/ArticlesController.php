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
        require('views/articleView.php');
    } 

    public function search($query)
    {
        $articlesManager = new ArticlesManager;
        $articles = $articlesManager->recherche($query);
        require('views/articlesView.php');
    } 

    public function usercomment()
    {
        $commentsManager = new CommentsManager;
        $usercomment = $commentsManager->commentaires_user();
        require('views/articleView.php');
    }

    public function postComment($id_membre, $id_article, $commentaire)
    {
        $articlesManager = new ArticlesManager;
        $commenter = $articlesManager->commenter($id_membre, $id_article, $commentaire);
        header("Location: index.php?action=article&id=" . $id_article);
    }
}