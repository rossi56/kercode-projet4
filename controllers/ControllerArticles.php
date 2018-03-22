<?php
require_once ('models/ArticlesManager.php');


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
     * Formatge de la date de publication des articles et des commentaires
     *
     * @return void
     */
   /**
     * Formatage de la date
     *
     * @param [type] $publication
     * @return void
     */


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