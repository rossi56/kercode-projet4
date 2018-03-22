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
    private $user;
    private $mail;
    private $password;


    public function __construct()
    {
        $this->compte= new MembresManager;
        $this->commentaires = new CommentsManager;
        $this->user = new MembresManager;
        $this->mail = new MembresManager;
        $this->password = new MembresManager;
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
        $membres = $this->membres->inscription($pseudo, $email, $emailconf, $password, $passwordconf);
        require('views/connexionView.php');
    }

    /**
     * Fonction de connexion
     *
     * @param [type] $pseudo
     * @return void
     */
    public function connect($pseudo)
    {
        $connect = $this->compte->connexion($pseudo);
        $erreur = "Les identifiants sont erronés !";

        if(password_verify($_POST['password'], $connect["password"])){
            $_SESSION["membre"] = $connect["id"];
            header("Location: index.php?action=compte");
         }else
            return $erreur;
        require('views/connexionView.php');
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

    public function update()
    {
        $user = $this->user->updateUser();
        if(isset($_POST['newPseudo']) AND !empty($_POST['newPseudo']) AND $_POST['newPseudo'] != $user['pseudo'])
        {   
            $user = $this->user->newPseudo();
            require ('views/editProfilView.php');
        }
        if(isset($_POST['newMail']) AND !empty($_POST['newMail']) AND $_POST['newMail'] != $user['Mail'])
        {  
            $mail = $this->user->newMail();
            require ('views/editProfilView.php');
        }

        if(isset($_POST['newPassword']) AND !empty($_POST['newPassword']) AND isset($_POST['newPasswordConf']) AND !empty($_POST['newPasswordConf']))
        {
            $password = sha1($_POST['newPassword']);
            $passwordconf = sha1($_POST['newPasswordConf']);
            if($password == $passwordconf)
            {
                $user = $this->user->newPassword();
                require ('views/editProfilView.php');
            }
            else
            {
               $erreur =  'Vos 2 mots de passe sont différents';
            }
        }   
    }
}