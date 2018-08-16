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
      $this->articleManager = new ArticlesManager;
      $this->commentsManager = new CommentsManager;
    }

    /**
     * Affiche le détail d'un seul article
     *
     * @param [type] $id
     * @return void
     */
    public function article($id) 
    {
      $article = $this->articleManager->getArticle($id);
      if(empty($article))
      {
        header("Location: index.php");//redirection vers page d'accueil si la variable article est vide
      }
      
      $commentaires = $this->commentsManager->getComments($id);
      $nb_commentaires = $this->commentsManager->getnbComments($id);
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
      if(!empty($commentaire))
      {
       
        $comment = $this->articleManager->commenter($id_membre, $id_article, $commentaire);
        array_push(self::$erreurs, '<h2>Votre Message a bien été envoyé !</h2>
        <i class="far fa-check-circle"></i>
         ');
       
      }
      else
      {
        
        array_push(self::$erreurs," <i class='fas fa-exclamation-triangle'></i> <br> Tous les champs sont obligatoires !" );
       
      }
      header('Location: index.php?action=article&id=' . $id_article);
    }


    /**
     * Signalement d'un commentaire
     *
     * @param [type] $id
     * @param [type] $id_article
     * @return void
     */
    public function reportComment($id, $id_article)
    {
      $commentaire = $this->articleManager->reportComment($id);
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
        $search = $this->articleManager->recherche($query);
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