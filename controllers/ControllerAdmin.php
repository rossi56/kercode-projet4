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
    private static $erreurs = [];

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
        array_push(self::$erreurs, '<h2>Votre chapitre a bien été publié !</h2>
            <i class="far fa-check-circle"></i>
             ');
        { //Récupération de l'image
            $image = basename($_FILES["file"]["name"]);
            $image2 = basename($_FILES["file2"]["name"]);//récupération du nom de l'image et pas du chemin complet avec la fonction basename
            //enregistrement définitif du fichier
            move_uploaded_file($_FILES["file"]["tmp_name"], '../public/img/' . $image);
            move_uploaded_file($_FILES["file2"]["tmp_name"], '../public/img/' . $image2);

           
            
            unset($_POST["titre"]);
            unset($_POST["contenu"]);
        }
        require ('views/publicationView.php');

    }


    public static function getErreur()
    {
        return self::$erreurs;
    }

    public function members()
    {
        $commentaires = $this->commentaires->lastComments();
        $membres = $this->membres->lastMembers();
        
        require ('views/adminView.php');
    }


    public function deleteMember($id)
    {
       $erase = $this->erase->eraseMember($id);                     
    }

    public function deleteComments($id)
    {
        $erase = $this->erase->eraseComments($id);
    }

    /**
     * Fonction de modification des chapitres publiés
     *
     * @return void
     */
    public function editer($titre, $contenu, $extrait, $id)
    {
        $posts = $this->posts->modifier($titre, $contenu, $extrait, $id);
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
        return $posts;
      
    }

    public function post($id)
    {
        $posts = $this->posts->post($id);
        return $posts;
    }

    /**
     * Fonction supression d'un chapitre
     *
     * @return void
     */
    public function deletePost($id)
    {
        
        $delete = $this->delete->supprimer($id);
        
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