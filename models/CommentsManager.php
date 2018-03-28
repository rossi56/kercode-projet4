<?php
require_once ('models/Model.php');

/**
 * Gestion des commentaires
 */
class CommentsManager extends Model
{

  /**
   * Fonction de gestion des commentaires
   *
   * @param [type] $id_article
   * @return void
   */
  public function getComments($id_article)
  {
    $bdd = $this->getBdd();
        
      $id_article = (int)$_GET["id"];
      $commentaires = $bdd->prepare("SELECT commentaires.*, membres.pseudo, membres.avatar FROM commentaires INNER JOIN membres ON commentaires.id_membre = membres.id AND commentaires.id_article = ?");
      $commentaires->execute([$id_article]);
      $commentaires = $commentaires->fetchAll();

        return $commentaires;
  }
        
    /**
     * Fonction de estion du nombre de commentaires
     *
     * @param [type] $id_article
     * @return void
     */
    public function getnbComments($id_article) 
    {
      $bdd = $this->getBdd();
        $id_article = (int)$_GET["id"];

        $nb_commentaires = $bdd->prepare("SELECT COUNT(*) FROM commentaires WHERE id_article = ?");
        $nb_commentaires->execute([$id_article]);
        $nb_commentaires = $nb_commentaires->fetch()[0];
          
          return $nb_commentaires;
    }

    /**
     * Fonction de gestion des commentaires utilisateurs
     *
     * @return void
     */  
    public function commentaires_user()
    {
      $bdd =$this->getBdd();

        $commentaires = $bdd->prepare("SELECT commentaires.*, articles.titre FROM commentaires INNER JOIN articles ON commentaires.id_article = articles.id AND commentaires.id_membre = ? ");
        $commentaires->execute([$_SESSION["membre"]]);
        $commentaires = $commentaires->fetchAll();
          
          return $commentaires;
    }

  


    /**
     * Affichage des 5 derniers commentaires
     *
     * @return void
     */
    public function lastComments()
    {
        $bdd = $this->getBdd();
        
        $last = $bdd->query("SELECT * FROM commentaires ORDER BY id DESC LIMIT 0,5");
        $last = $last->fetchAll();

        return $last;
    }

    public function getReports()
    {
        $bdd = $this->getBdd();
        
        $report = $bdd->query("SELECT * FROM commentaires WHERE report != 0 ");
       
        return $report;
    }

    public function valideReports()
    {
        $bdd = $this->getBdd();
        
        $report = $bdd->prepare("UPDATE commentaires SET report = 0 WHERE id = ?");
        $report->execute([$_GET['id']]);
    }
}