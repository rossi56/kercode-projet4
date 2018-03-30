<?php
require_once 'models/AdminManager.php';
require_once 'models/CommentsManager.php';
require_once 'models/MembresManager.php';

/**
 * Contrôleur Administration
 */
class ControllerAdmin
{
    private $delete;
    private $posts;
    private $commentaires;
    private $membres;
    private $erase;
    private static $erreurs = [];
    private static $chapter;
    private $reports;

    public function __construct()
    {
        $this->adminManager = new AdminManager;
        $this->commentsManager = new CommentsManager;
        $this->membresManager = new MembresManager;

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
    public function publier($image, $image2, $contenu, $titre)
    {
        $posts = $this->adminManager->poster($image2, $image, $contenu, $titre);
       
        extract($_POST);

        $validation = true;

        if(empty($titre) || empty($contenu)) {//Vérif de présence de contenu et d'un titre
            $validation = false;
            array_push(self::$erreurs, " <i class='fas fa-exclamation-triangle'></i> <br> Tous les champs sont obligatoires !");
        }

        if(!isset($_FILES["file"]) OR $_FILES["file"]["error"] > 0) {//Vérif de la présence d'image
            $validation = false;
            array_push(self::$erreurs, " <i class='fas fa-exclamation-triangle'></i> <br> Aucune photo de présentation sélectionnée!");
        }

            if(!isset($_FILES["file2"]) OR $_FILES["file2"]["error"] > 0) {//Vérif de la présence d'image
                $validation = false;
                array_push(self::$erreurs, " <i class='fas fa-exclamation-triangle'></i> <br> Aucune photo d'article sélectionnée!");

        }
        if($validation) 
        {
            array_push(self::$erreurs, '<h2>Votre chapitre a bien été publié !</h2>
            <i class="far fa-check-circle"></i>
             ');
            //Récupération de l'image
            $image = basename($_FILES["file"]["name"]);
            $image2 = basename($_FILES["file2"]["name"]);//récupération du nom de l'image et pas du chemin complet avec la fonction basename
            //enregistrement définitif du fichier
            move_uploaded_file($_FILES["file"]["tmp_name"], 'public/img/article' . $image);
            move_uploaded_file($_FILES["file2"]["tmp_name"], 'public/img/presentation' . $image2);

           
            
            unset($_POST["titre"]);
            unset($_POST["contenu"]);
        }
        require ('views/publicationView.php');

    }

    /**
     * Récupération du tableau d'erreur
     *
     * @return void
     */
    public static function getErreur()
    {
        return self::$erreurs;
    }
    /**
     * Récupération des infos membres
     *
     * @return void
     */
    public function members()
    {
        $commentaires = $this->commentsManager->lastComments();
        $membres = $this->membresManager->lastMembers();
        $reports = $this->commentsManager->getReports();
        
            
        require ('views/adminView.php');
    }

    
    /**
     * Validation des commenatires signalés
     *
     * @return void
     */
    public function validate()
    {
        $reports = $this->commentsManager->valideReports();
        header ('Location: admin.php?action=admin');
    }

    /**
     * Supression d'un membre
     *
     * @param [type] $id
     * @return void
     */
    public function deleteMember($id)
    {
       $erase = $this->adminManager->eraseMember($id);                     
    }


    /**
     * Suppression d'un membre
     *
     * @param [type] $id
     * @return void
     */
    public function deleteComment($id)
    {
        $erase = $this->adminManager->eraseComment($id);
        header ('Location: admin.php?action=admin');
    }

    /**
     * Fonction de modification des chapitres publiés
     *
     * @return void
     */
    public function editer($id, $titre, $contenu)
    { 
        $posts = $this->adminManager->modifier($id, $titre, $contenu);
        return $posts;
    }


    
    /**
     * Fonction d'affichage des anciens chapitres publiés
     *
     * @return void
     */
    public function anciens()
    {
        $posts = $this->adminManager->oldPosts();
        return $posts;
      
    }


    /**
     * Fonction modif d'un article
     *
     * @param [type] $id
     * @return void
     */
    public function post($id)
    {
        $posts = $this->adminManager->post($id);
        return $posts;
    }

    /**
     * Fonction supression d'un chapitre et de ses commentaires
     *
     * @return void
     */
    public function deletePost($id)
    {
        $delete = $this->adminManager->eraseComments($id);
        $delete = $this->adminManager->supprimer($id);    
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
        header("Location: home.php");
    }
}