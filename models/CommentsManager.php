<?php
require_once ('models/Model.php');
class CommentsManager extends Model
{

         /*   Gestion des commentaires   */
         public function getComments($id_article){
            $bdd = $this->getBdd();
    
            $id_article = (int)$_GET["id"];
            $commentaires = $bdd->prepare("SELECT commentaires.*, membres.pseudo, membres.avatar FROM commentaires INNER JOIN membres ON commentaires.id_membre = membres.id AND commentaires.id_article = ?");
            $commentaires->execute([$id_article]);
            $commentaires = $commentaires->fetchAll();
    
    
            return $commentaires;
    
        }
        
        
       /*Gestion du nombre de commentaires*/
    
      public function getnbComments($id_article) {
        $bdd = $this->getBdd();
        $id_article = (int)$_GET["id"];

        $nb_commentaires = $bdd->prepare("SELECT COUNT(*) FROM commentaires WHERE id_article = ?");
        $nb_commentaires->execute([$id_article]);
        $nb_commentaires = $nb_commentaires->fetch()[0];
        
        return $nb_commentaires;
    }

      // FONCTION COMMENTAIRES UTILISATEUR

      public function commentaires_user(){
        $bdd =$this->getBdd();

    $commentaires = $bdd->prepare("SELECT commentaires.*, articles.titre FROM commentaires INNER JOIN articles ON commentaires.id_article = articles.id AND commentaires.id_membre = ? ");
    $commentaires->execute([$_SESSION["membre"]]);
    $commentaires = $commentaires->fetchAll();

    return $commentaires;

}



}