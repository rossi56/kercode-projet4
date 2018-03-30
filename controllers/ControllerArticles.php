<?php
require_once ('models/ArticlesManager.php');

/**
 * Aff
 */
class ControllerArticles
{
    private $article;
    
   

    public function __construct()
    {
        $this->article = new ArticlesManager();
        $this->search = new ArticlesManager();
    }

    /**
     * AFFICHAGE DE PLUSIEURS ARTICLES
     *
     * @return void
     */
    public function articles()
    {
        $articles = $this->article->getArticles();
        require ('views/articlesView.php');
    }




    /**
     * Fonction de la barre de recherche
     *
     * @param [type] $query
     * @return void
     */
    public function search($query)
    {
        $articles = $this->article->recherche($query);
        require ('views/articlesView.php');
    }     
}    