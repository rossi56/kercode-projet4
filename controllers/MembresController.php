<?php
require_once ('models/MembresManager.php');
require_once ('models/CommentsManager.php');
class MembresController
{
    //AFFICHAGE DE PLUSIEURS ARTICLES
    public function inscrire($pseudo, $email, $emailconf, $password, $passwordconf)
    {
        $membresManager = new MembresManager;
       
        $membres = $membresManager->inscription($pseudo, $email, $emailconf, $password, $passwordconf);
        
        require('views/inscriptionView.php');
    }

    public function pseudoExist($pseudo)
    {
        $membresManager = new MembresManager;
        $membres = $membresManager->existe($pseudo);
        require('views/inscriptionView.php');
    }
   
    public function connect($pseudo)
    {
        $membresManager = new MembresManager;
        $connect = $membresManager->connexion($pseudo);
        $erreur = "Les identifiants sont erronés !";

        if(password_verify($_POST['password'], $connect["password"])){
            $_SESSION["membre"] = $connect["id"];
            header("Location: index.php?action=compte");
         }else
            return $erreur;
        require('views/connexionView.php');
    }

     //Fonction déconnexion

     public function deconnexion() {
        
        $_SESSION = array();
        session_destroy();
        session_start();
        header("Location: index.php");
    }

    public function compte($id)
    {
        $membresManager = new MembresManager;
        $commentsManager = new CommentsManager();
        $commentaires = $commentsManager->commentaires_user();
        $compte = $membresManager->infos($id);
        require('views/compteView.php');
    }
}