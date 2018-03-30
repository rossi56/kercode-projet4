<?php
require_once ('models/MembresManager.php');
require_once ('models/CommentsManager.php');


/**
 * Contrôleur Membres
 */
class ControllerMembres
{
    public static $erreurs = [];
    private $compte;
    private $commentaires;
    private $membres;
    private static $user;
    private $userManager;
    private $mail;
    private $pseudo;
    private $password;
    private $avatar;


    public function __construct()
    {
        $this->membresManager= new MembresManager;
        $this->commentsManager = new CommentsManager;
    }
    
    /**
     * Fonction d'inscription
     *
     * @param [type] $pseudo
     * @param [type] $email
     * @param [type] $emailconf
     * @param [type] $password
     * @param [type] $passwordconf
     * @return void
     */
    public function inscrire($pseudo, $email, $emailconf, $password, $passwordconf)
    {      
       

        $validation = true;

        if(empty($pseudo) || empty($email) || empty($emailconf) || empty($password) || empty($passwordconf))
        {
            $validation = false;
            array_push(self::$erreurs,"<i class='fas fa-exclamation-triangle'></i> <br>Tous les champs sont obligatoires !" );
        }
        if($this->pseudo->existe($pseudo))
        {
            $validation = false;
            array_push(self::$erreurs,"<i class='fas fa-exclamation-triangle'></i> <br>Ce pseudo n'est pas disponible !" );
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $validation = false;
            array_push(self::$erreurs, "<i class='fas fa-exclamation-triangle'></i> <br>L'adresse e-mail n'est pas valide !");
        }
        elseif ($emailconf != $email) 
        {
            $validation = false;
            array_push(self::$erreurs,  "<i class='fas fa-exclamation-triangle'></i> <br>L'adresse e-mail de confirmation est incorrecte !");
        }
        if(!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$#', $password)) 
        {
            $validation = false;
            array_push(self::$erreurs,  "<i class='fas fa-exclamation-triangle'></i> <br>Le mot de passe n'est pas valide !");
        }
        if($passwordconf != $password) 
        {
            $validation = false;
            array_push(self::$erreurs,  "<i class='fas fa-exclamation-triangle'></i> <br>Le mot de passe de confirmation est incorrect !");
        }
        if($validation) 
        {
            $membres = $this->membresManager->inscription($pseudo, $email, $emailconf, $password, $passwordconf);
            array_push(self::$erreurs, '<h2>Votre inscription est validée !</h2>
            <i class="far fa-check-circle"></i>
             ');
        }

        require('views/inscriptionView.php');
    }



    /**
     * Fonction de connexion
     *
     * @param [type] $pseudo
     * @return void
     */
    public function connect($pseudo)
    {
        $compte = $this->membresManager->connexion($pseudo);
        array_push(self::$erreurs,"<i class='fas fa-exclamation-triangle'></i> <br> Les identifiants sont erronés !" );

        if(password_verify($_POST['password'], $compte["password"]))
        {
            $_SESSION["membre"] = $compte["id"];
            header("Location: index.php?action=compte");
        }
    }

    public function pseudoExist($pseudo)
    {
        $pseudo = $this->membresManager->existe($pseudo);
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

        

    /**
     * Fonction de déconnexion
     *
     * @return void
     */
     public function deconnexion() {
        
        $_SESSION = array();
        session_destroy();
        session_start();
        header("Location: home.php");
    }
    

    /**
     * Fonction Espace Membre
     *
     * @param [type] $id
     * @return void
     */
    public function compte($id)
    {
        $commentaires = $this->commentsManager->commentaires_user();
        $compte =  $this->membresManager->infos($id);
        require('views/compteView.php');
    }

    
    /**
     * Edition du profil membre
     *
     * @param [type] $id
     * @return void
     */
    public function update($id)
    {
            self::$user = $this->membresManager->selectUser($id);
      
            if(isset($_POST['newPseudo']) AND !empty($_POST['newPseudo']) AND $_POST['newPseudo'] != self::$user['pseudo'])
            {   
                $pseudo = $this->membresManager->newPseudo($id, $newPseudo);
                require ('views/editProfilView.php');
            }
            if(isset($_POST['newMail']) AND !empty($_POST['newMail']) AND $_POST['newMail'] != self::$user['Mail'])
            {  
                $mail = $this->membresManager->newMail($id, $newMail);
                require ('views/editProfilView.php');
            }
    
            if(isset($_POST['newPassword']) AND !empty($_POST['newPassword']) AND isset($_POST['newPasswordConf']) AND !empty($_POST['newPasswordConf']))
            {
                $password = sha1($_POST['newPassword']);
                $passwordconf = sha1($_POST['newPasswordConf']);
                if($password == $passwordconf)
                {
                    $password = $this->membresManager->newPassword($id, $_POST['newPassword']);
                    require ('views/editProfilView.php');
                }
                else
                {
                  array_push(self::$erreurs, 'Vos 2 mots de passe sont différents');
                }
            
            }
       
    }


    public function newAvatar($avatar, $id)
    {
        $avatar = $this->membresManager->newAvatar($avatar, $id);
        if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']));
    {
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        if($_FILES['avatar']['size'] <= 2097152)
        {
            if(in_array(strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1)), $extensionsValides))
            {
                $avatar = move_uploaded_file($_FILES['avatar']['tmp_name'],"public/avatar/");
                if($avatar)
                {
                    array_push(self::$erreurs, "Votre avatar a bien été mis à jour !");
                }
                else
                {
                    array_push(self::$erreurs, "Une erreur s'est produite durant l'importation de l'avatar !");
                }
            }
            else
            {
                array_push(self::$erreurs, 'Votre avatar doit être au format jpg, jpeg, gif ou png');
            }
        }
        else
        {
            array_push(self::$erreurs, 'Votre avatar ne doit pas dépasser 2Mo');
        }
    }

    }
    

    /**
     * Récupération d'un membre pour édition du profil membre
     *
     * @return void
     */
    public static function getUser()
    {
       
        return self::$user;
        
    }
}