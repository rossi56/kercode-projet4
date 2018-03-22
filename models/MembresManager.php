<?php
require_once ('models/Model.php');

/**
 * Gestions des membres
 */
class MembresManager extends Model
{

    /**
     * Fonction pour vérifier si pseudo est disponible dans la base de données
     *
     * @param [type] $pseudo
     * @return void
     */
    public function existe($pseudo) {
        $bdd = $this->getBdd();

        $resultat = $bdd->prepare("SELECT COUNT(*) FROM membres WHERE pseudo = ?");
        $resultat->execute([$pseudo]);
        $resultat = $resultat->fetch() [0];

        return $resultat;
    }

    /**
     * Fonction de gestion des erreurs d'entrées dans les champs du formulaire d'inscription
     *
     * @param [type] $pseudo
     * @param [type] $email
     * @param [type] $emailconf
     * @param [type] $password
     * @param [type] $passwordconf
     * @return void
     */
    public function inscription($pseudo, $email, $emailconf, $password, $passwordconf){
        $bdd = $this->getBdd();


        $validation = true;
        $erreurs = [];

        if(empty($pseudo) || empty($email) || empty($emailconf) || empty($password) || empty($passwordconf)){
            $validation = false;
            $erreurs[] = "Tous les champs sont obligatoires !";
        }
        if($this->existe($pseudo)){
            $validation = false;
            $erreurs[] = "Ce pseudo n'est pas disponible !";
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation = false;
            $erreur = "L'adresse e-mail n'est pas valide !";
        }
        elseif ($emailconf != $email) {
            $validation = false;
            $erreur = "L'adresse e-mail de confirmation est incorrecte !";
        }
        if($passwordconf != $password) {
            $validation = false;
            $erreur = "Le mot de passe de confirmation est incorrect !";
        }
        if($validation) {
            $inscription = $bdd->prepare("INSERT INTO membres (pseudo, email, `password`, avatar) VALUES(:pseudo, :email, :password, :avatar)");
            $inscription->execute([
                "pseudo" => htmlentities($pseudo),
                "email" => htmlentities($email),
                "password" => password_hash($password, PASSWORD_DEFAULT),
                "avatar" => "user.png"
            ]);
            unset($_POST["pseudo"]);
            unset($_POST["email"]);
            unset($_POST["emailconf"]);
            //Vider les champs après validation
        }

        return $erreurs;
    }


    /**
     * Fonction connexion membre
     *
     * @param [type] $pseudo
     * @return void
     */
    public function connexion($pseudo){
        $bdd = $this->getBdd();
        
    //extraire donnée de la table membre
        extract($_POST);

        $connexion = $bdd->prepare("SELECT id, password FROM membres WHERE pseudo = ?");
        $connexion->execute([$pseudo]);
        $connexion = $connexion->fetch();

        return $connexion;
    }


    /**
     * Fonction affichage du profil des membres
     *
     * @param [type] $id
     * @return void
     */
    public function infos($id)
    {
        $bdd = $this->getBdd();
        
        $membre = $bdd->prepare("SELECT pseudo, email, avatar FROM membres WHERE id = ?");
        $membre->execute([$_SESSION["membre"]]);
        $membre = $membre->fetch();

        return $membre;
    }


    /**
     * Affichage des 5 derniers membres inscrits
     *
     * @return void
     */
    public function lastMembers()
    {
        $bdd = $this->getBdd();
        
        $last = $bdd->query("SELECT id, pseudo, avatar FROM membres ORDER BY id DESC LIMIT 0,5");
        $last = $last->fetchall();

        return $last;
    }



    public function updateUser()
    {
        $bdd = $this->getBdd();
        $update = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $update->execute([$_SESSION["membre"]]);
        $user = $update->fetch();
    }

    public function newPseudo()
    {
        $bdd = $this->getBdd();
        $newPseudo = htmlentities($_POST['newPseudo']);
        $insertPseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?");
        $insertPseudo->execute(array($newPseudo, $_SESSION['membres']));
        header('Location: index.php?action=compte');
    }

    
    public function newMail()
    {
        $bdd = $this->getBdd();
        $newMail = htmlentities($_POST['newMail']);
        $insertMail = $bdd->prepare("UPDATE membres SET email = ? WHERE id = ?");
        $insertMail->execute(array($newMail, $_SESSION['membres']));
        header('Location: index.php?action=compte');
    }

    public function newMdp()
    {
        $bdd = $this->getBdd();
        $newMdp = htmlentities($_POST['newMdp']);
        $insertMdp = $bdd->prepare("UPDATE membres SET password = ? WHERE id = ?");
        $insertMdp->execute(array($newMdp, $_SESSION['membres']));
        header('Location: index.php?action=compte');
    }
}