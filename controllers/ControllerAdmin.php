<?php
require_once 'models/AdminManager.php';
require_once 'models/CommentsManager.php';
require_once 'models/MembresManager.php';

/**
 * Contrôleur Administration
 */
class ControllerAdmin
{
    private $edit;
    private $delete;
    private $posts;
    private $commentaires;
    private $membres;
    private $erase;

    public function __construct()
    {
        $this->edit = new AdminManager;
        $this->delete = new AdminManager;
        $this->posts = new AdminManager;
        $this->commentaires = new CommentsManager;
        $this->membres = new MembresManager;
        $this->erase = new AdminManager;

    }
    
    /**
     * Fonction de publication des articles
     *
     * @param [type] $image2
     * @param [type] $image
     * @param [type] $contenu
     * @param [type] $titre
     * @return void
     */
    public function publier($image2, $image, $contenu, $titre)
    {
        $posts = $this->posts->poster($image2, $image, $contenu, $titre);
        require ('views/publicationView.php');

    }


    public function members()
    {
        $commentaires = $this->commentaires->lastComments();
        $membres = $this->membres->lastMembers();
        
        require ('views/adminView.php');
    }


    public function eraseMember()
    {
       $erase = $this->erase->eraseMember();                     
    }

    /**
     * Fonction de modification des chapitres publiés
     *
     * @return void
     */
    public function editer()
    {
        $posts = $this->posts->modifier();
        require ('views/modifView.php');
    }

    
    /**
     * Fonction d'affichage des anciens chapitres publiés
     *
     * @return void
     */
    public function anciens()
    {
        $posts = $this->posts->oldPosts();
    }

    /**
     * Fonction supression d'un chapitre
     *
     * @return void
     */
    public function deletePost()
    {
        
        $delete = $this->delete->supprimer();
        require ('views/LastestPostsView.php');
    }

     
    /**
     * Fonction de déconnexion
     *
     * @return void
     */
    public function deconnexion() 
    {
        
        $_SESSION = array();
        session_destroy();
        session_start();
        header("Location: index.php");
    }
}