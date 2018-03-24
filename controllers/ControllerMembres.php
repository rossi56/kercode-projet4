<?php
require_once ('models/MembresManager.php');
require_once ('models/CommentsManager.php');


/**
 * Contrôleur Membres
 */
class ControllerMembres
{
    private $compte;
    private $commentaires;
    public static $erreurs = [];
    private $membres;
    private static $user;
    private $userManager;
    private $mail;
    private $pseudo;
    private $password;


    public function __construct()
    {
        $this->compte= new MembresManager;
        $this->commentaires = new CommentsManager;
        $this->userManager = new MembresManager;
        $this->mail = new MembresManager;
        $this->password = new MembresManager;
        $this->pseudo = new MembresManager;
        $this->membres = new MembresManager;
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

        if(empty($pseudo) || empty($email) || empty($emailconf) || empty($password) || empty($passwordconf)){
            $validation = false;
            array_push(self::$erreurs,"<i class='fas fa-exclamation-triangle'></i> <br>Tous les champs sont obligatoires !" );
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            array_push(self::$erreurs, "<i class='fas fa-exclamation-triangle'></i> <br>L'adresse e-mail n'est pas valide !");
        }
        elseif ($emailconf != $email) {
            $validation = false;
            array_push(self::$erreurs,  "<i class='fas fa-exclamation-triangle'></i> <br>L'adresse e-mail de confirmation est incorrecte !");
        }
        if($passwordconf != $password) {
            $validation = false;
            array_push(self::$erreurs,  "<i class='fas fa-exclamation-triangle'></i> <br>Le mot de passe de confirmation est incorrect !");
        }
        if($validation) {
            $membres = $this->membres->inscription($pseudo, $email, $emailconf, $password, $passwordconf);
            array_push(self::$erreurs, '<h2>Votre Message a bien été envoyé !</h2>
            <i class="far fa-check-circle"></i>
             ');
        // require('views/connexionView.php');
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
        $compte = $this->compte->connexion($pseudo);
        array_push(self::$erreurs,"<i class='fas fa-exclamation-triangle'></i> <br> Les identifiants sont erronés !" );

        if(password_verify($_POST['password'], $compte["password"]))
        {
            $_SESSION["membre"] = $compte["id"];
            header("Location: index.php?action=compte");
        }
    }

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
        $commentaires = $this->commentaires->commentaires_user();
        $compte =  $this->compte->infos($id);
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
            self::$user = $this->userManager->selectUser($id);
      
            if(isset($_POST['newPseudo']) AND !empty($_POST['newPseudo']) AND $_POST['newPseudo'] != self::$user['pseudo'])
            {   
                $pseudo = $this->pseudo->newPseudo($id, $newPseudo);
                require ('views/editProfilView.php');
            }
            if(isset($_POST['newMail']) AND !empty($_POST['newMail']) AND $_POST['newMail'] != self::$user['Mail'])
            {  
                $mail = $this->mail->newMail($id, $newMail);
                require ('views/editProfilView.php');
            }
    
            if(isset($_POST['newPassword']) AND !empty($_POST['newPassword']) AND isset($_POST['newPasswordConf']) AND !empty($_POST['newPasswordConf']))
            {
                $password = sha1($_POST['newPassword']);
                $passwordconf = sha1($_POST['newPasswordConf']);
                if($password == $passwordconf)
                {
                    $password = $this->password->newPassword($id, $_POST['newPassword']);
                    require ('views/editProfilView.php');
                }
                else
                {
                  array_push(self::$erreurs, 'Vos 2 mots de passe sont différents');
                }
            
        }
        
    }

    public static function getUser()
    {
       
        return self::$user;
        
    }
}