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

    /*Formatage de la date de publication*/
    function formatage_date($publication){
        $publication = explode(" ", $publication);
        $date = explode("-", $publication[0]);
        $heure = explode(":",$publication[1]);
        $mois = ["", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"];
        $resultat = $date[2] . ' ' . $mois[(int)$date[1]] . ' ' . $date[0] . ' à ' . $heure[0] . ' h ' . $heure [1];
        return $resultat;
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