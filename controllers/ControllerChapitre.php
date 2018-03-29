<?php

require_once 'models/ArticlesManager.php';
require_once 'models/CommentsManager.php';

/**
 * Contrôleur Chapitre
 */
class ControllerChapitre
{

  private $article;
  private $commentaire;
  private $nb_commentaires;
  private $comment;
  private $search;
  public static $erreurs = [];

    
    public function __construct() 
    {
      $this->article = new ArticlesManager;
      $this->commentaire = new CommentsManager;
      $this->nb_commentaires = new CommentsManager;
      $this->comment = new ArticlesManager;
      $this->search = new ArticlesManager;
    }

    /**
     * Affiche le détail d'un seul article
     *
     * @param [type] $id
     * @return void
     */
    public function article($id) 
    {
      $article = $this->article->getArticle($id);
      $commentaires = $this->commentaire->getComments($id);
      $nb_commentaires = $this->nb_commentaires->getnbComments($id);
      require ('views/chapitreView.php');
    }

   

    /**
     * Fonction pour poster des commentaires
     *
     * @param [type] $id_membre
     * @param [type] $id_article
     * @param [type] $commentaire
     * @return void
     */
    public function postComment($id_membre, $id_article, $commentaire)
    {
      $comment = $this->comment->commenter($id_membre, $id_article, $commentaire);

      if(!empty($commentaire))
      {
        array_push(self::$erreurs, '<h2>Votre Message a bien été envoyé !</h2>
        <i class="far fa-check-circle"></i>
         ');
       
      }
      else
      {
        array_push(self::$erreurs," <i class='fas fa-exclamation-triangle'></i> <br> Tous les champs sont obligatoires !" );
       
      }
      header("Location: index.php?action=article&id=" . $id_article);
    }


    public function reportComment($id, $id_article)
    {
      $commentaire = $this->comment->reportComments($id, $id_article);
      header("Location: index.php?action=article&id=" . $id_article);
    }



    /**
     * Fonction recherche barre de recherche
     *
     * @param [type] $query
     * @return void
     */
    public function search($query)
    {
        $search = $this->search->recherche($query);
        require('views/articlesView.php');
    } 

       /**
     * Fonction de récupération des erreurs de formulaires
     *
     * @return void
     */
    public static function getErreur()
    {
        return self::$erreurs;
    }
}